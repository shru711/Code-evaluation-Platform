import os
import sys
import stat
import time
import multiprocessing
from db import *

#to delete a file
def deleteFile(srn,fileName):
	deleteCommand="rm "+srn+"/"+fileName
	os.system(deleteCommand)

def concatenate(content,tc):
	count = -1
	t=""
	string = ["##"+str(i+1) for i in range(0,tc)]
	inputs = [[] for i in range(0,tc)]
	for j in range(0, len(content)):
		if content[j] in string:
			count = count+ 1
			t = ""
		else:
			t.strip()
			t = t + " " + str(content[j])
			inputs[count] = t
	#print("inputs added here roshni \n",inputs)
	return inputs

	
def readAdminFiles(filename):
	with open(filename, "r") as f:
		content = f.readlines()
		f.close()
	return content


#to delete the error file
def deleteErrorFile(path):
	deleteCommand="rm "+path
	os.system(deleteCommand)

#finding the next num in the error file directory path
def findNextErrorFileNumber(path):
	#path, dirs, files = os.walk(path).__next__()
	#fileCount = len(files)
	return len(os.listdir(path))+1

#checking if error directory exists srn wise
def checkIfErrorAssignmentDirectoryExists(section,srn,assignmentNumber,qno):
	return os.path.isdir(section+"/"+srn+"/"+"Errors/"+assignmentNumber+"//"+qno)

#creating error directory assignment wise
def createErrorDirectoryAssignmentWise(section,srn,assignmentNumber,qno):
	errorDirectory=section+"/"+srn+"/"+"Errors/"+assignmentNumber+"/"+qno
	os.system("mkdir -m 0777 -p "+errorDirectory)

#check if the two files are the same
# is same return 1
# else return 0
def checkCorrectness(outputPath,admin_path_op, timeLimitExceeded):
	
	with open(outputPath,"r") as op:
		output = op.read()
		#print("<br>user output : ['",output,"']\n",sep='');
	op.close()
	with open(admin_path_op,"r") as op:
		adminop = op.read()
	op.close()
	
	if timeLimitExceeded==1:
		output = "Time Limit Exceeded!!"
	output = output.replace('\n',' ')
	#adminop = adminop.replace(' ','')
	#print("<div class=\"invi\"><br>user output :",output,"</div>")
	#print("<div class=\"invi\"><br>admin output : ",adminop,"</div>")

	
	
	if(output.strip()==adminop.strip()):
		return 1
	return 0


def runTestCase(commandOutputRedirected):
	os.system(commandOutputRedirected)

	
#compilation and error handling
def compile(filename,filename1,filename2,section,assignmentNumber,qno,srn,inputfile,actualOp,marks):
	
	#location of the code to be compiled
	path=section+"//"+srn+"//"+assignmentNumber+"//"+qno+"//*.c"

	#admin input file for the question
	admin_path_ip = "admin/" +assignmentNumber+ "/"+qno+"//"+ inputfile

	#admin output file for the question	
	admin_path_op = "admin/" +assignmentNumber+ "/"+qno+"//"+ actualOp
	
	#admin marks file for the question and its test cases
	marks_path = "admin/" +assignmentNumber+ "/"+qno+"/"+ marks
	
	#to read input test case wise
	temp_ip_path = section+"//"+srn+"//"+assignmentNumber+"//"+qno+"//"+"temp_ip.txt"
	
	#output test case wise
	temp_op_path = section+"//"+srn+"//"+assignmentNumber+"//"+qno+"//"+"temp_op.txt"
	
	# user temporary output
	temp_user_op_path = section+"//"+srn+"//"+assignmentNumber+"//"+qno+"//"+"temp_user_op.txt"

	#temp marks for test case
	temp_marks_path = section+"//"+srn+"//"+assignmentNumber+"//"+qno+"//"+"temp_marks.txt"
	

	#next error file number
	nextCount=findNextErrorFileNumber('Errors//')

	# creating the new error file
	errorFilePath="Errors//"+str(nextCount)+".txt"

	# command for checking compilation errors
	command="gcc -w "+path+" <"+admin_path_ip+" 2>"+errorFilePath+ " -lm"
	
	#executing the compilation
	os.system(command)
	
	#reading the error file
	with open(errorFilePath,"r") as f:
		output=f.read()
	f=open(errorFilePath,"r")
	lines=f.readlines()
	f.close()
	if len(lines)!=0:
		print("<div class=\"err\"><br>")
		for line in lines:
			print(line, "<br>")
		print("<br></div>")
	# if error file empty => compilation successful, can execute
	if(output==''):
		#delete the error file
		deleteErrorFile(errorFilePath)
		outputPath=srn+"//"+assignmentNumber+"//outputof"+filename+".txt"
		'''commandOutputRedirected="./a.out <" + admin_path_ip + " -a>"+outputPath
		outputReturned=os.system(commandOutputRedirected)'''
		
		#########################New Stuff###################
		#STEP 1: read data out of ip, op and marks files individually
		content = [str(x) for x in readAdminFiles(admin_path_ip)]

		for i in range(len(content)):
			if content[i]!=' '  and content[i] != '\t' and content[i] != '\n':
				content[i]=content[i].strip()				
		#print(content)
		opcontent = [str(x.strip()) for x in readAdminFiles(admin_path_op)]
		marks = [str(x.strip()) for x in readAdminFiles(marks_path)]
		#user_op = [str(x.strip()) for x in readAdminFiles(outputPath)]

		#STEP 2: read the number of testcases from the admin file
		tc = int(content[0])
		content.pop(0)

		#STEP 3: Convert read strings into arrays
		inputs = concatenate(content,tc)
		outputs = concatenate(opcontent,tc)
		

		#STEP 4: Run each test case individually. Done by running them as a different process. If timed out, process ends and Time Limit Exceeded is displayed.
		returnList=[]
		total = 0
		passedCorrectly=[]
		passedWrongly=[]
		timeLE=[]
		for i in range(tc):
			#print(i)
			timeLimitExceeded = 0
			with open(temp_ip_path,"w") as case_input:  ##OPTIMIZATION TO BE DONE: make test case files only once, not over and over again
				case_input.write(str(inputs[i]))
				#print(" <div class=\"invi\"><br><br>inputs of ",i+1,":",inputs[i],"</div>")
			case_input.close()
			#print("expected outputs are : ",outputs[i].split())
			with open(temp_op_path,"w") as case_output:           
				case_output.write(str(outputs[i]))
			case_output.close()
			with open(temp_marks_path,"w") as case_marks:           
				case_marks.write(marks[i])
			commandOutputRedirected="./a.out <" + temp_ip_path + " -a>"+temp_user_op_path+ " -lm"
			newProcess = multiprocessing.Process(target=runTestCase, name = "runTestCase", args = (commandOutputRedirected,))
			newProcess.start()
			newProcess.join(2)
			if newProcess.is_alive():
				newProcess.terminate()
				newProcess.join()
				timeLimitExceeded = 1
				os.system("pkill a.out")
				with open(temp_user_op_path,"w") as user_case_output:           
					user_case_output.write("Time Limit Exceeded!!")
					timeLE.append(i+1)
				user_case_output.close()
			#####################Print a time limit exceeded error here############################
			if(checkCorrectness(temp_user_op_path,temp_op_path, timeLimitExceeded)==1):
				total+=int(marks[i])
				passedCorrectly.append(i+1)
			else:
				passedWrongly.append(i+1)


		returnList.append(passedCorrectly)
		returnList.append(passedWrongly)
		returnList.append(total)
		maxmarks=0
		for i in marks:
			maxmarks=maxmarks+int(i)
		total_testcases = len(passedCorrectly) + len(passedWrongly)
		
	
		print("<div class='marks'>")
		print("<table id='table4' style=margin-top:10px; border: solid border-collapse:collapse>")
		print("<tr>")
		print("<th>Test Case</th>")
		#print("<th>Result</th>")
		print("<th>Marks</th>")
		print("<th>Status</th></tr>")
		
	
		for j in range(tc):
			print("<tr>")
			print("<td>",j+1,"</td>")
			if (j+1) in passedCorrectly:
				flag=1
				#print("<div class=\"passed\"><td>Test case passed</td>")
			else:
				flag=0
				#print("<div class=\"failed\"><td>Test case failed</td>")
			if flag==1:
				print("<td><div class='passed'>",flag*marks[j],"/",marks[j],"</div></td><td><div class='pass'>&#10004</div></td>")
			else:
				if(j+1) in timeLE:
					print("<td><div class='failed'>","0 /",marks[j],"</div></td><td><div class='time'>L</div></td>")
				else:	
					print("<td><div class='failed'>","0 /",marks[j],"</div></td><td><div class='wrong'>&#10005</div></td>")
			print("</tr>")
		print("<tr>")
		#print("<td> </td>")
		print("<th> Total marks earned</th>")
		print("<th>",total,"/",maxmarks,"</th>")
		print("<th></th></tr>")
		print("</table>")
		print("</div>")
		'''print("<div class=\"test\"><br>Total Number of test cases : ",total_testcases,"</div>")
		print("<div class=\"test\"><br>Number of Test Cases Passed : ",len(passedCorrectly),"</div>")
		print("<div class=\"test\"><br>List of Test Cases Passed : ",passedCorrectly,"</div>")
		print("<div class=\"test\"><br>List of Test Cases Failed : ",passedWrongly,"</div>")
		print("<div class=\"test\"><br>Marks Earned: ", total, "out of ", maxmarks,"</div>") '''		# To delete the temporary files :
		#os.system("sudo rm -f " + temp_ip_path) 
		#os.system("sudo rm -f " + temp_op_path) 
		#os.system("sudo rm -f " + temp_user_op_path) 
		#os.system("sudo rm -f " + temp_marks_path)
		os.chmod(temp_marks_path,0o666)
		os.chmod(temp_ip_path,0o666)
		os.chmod(temp_user_op_path,0o666)
		os.chmod(temp_op_path,0o666)
		# To delete the temporary files :
		deleteErrorFile(temp_marks_path)
		#deleteErrorFile(temp_ip_path)
		deleteErrorFile(temp_user_op_path)
		deleteErrorFile(temp_op_path)
		return [1,'',returnList]


	else:
		error=output
		code=lines
		'''with open(path,"r") as readCode:
			code=readCode.read()
		readCode.close()'''
		
		if(checkIfErrorAssignmentDirectoryExists(section,srn,assignmentNumber,qno)==False):
			createErrorDirectoryAssignmentWise(section,srn,assignmentNumber,qno)
		fileNum=findNextErrorFileNumber(section+"//"+srn+"/"+"Errors/"+assignmentNumber+"//"+qno)
		filePath=section+"//"+srn+"/"+"Errors/"+assignmentNumber+"//"+qno+"//"+str(fileNum)+".txt"
		#print(filePath)
		#print("Compile time error: ",error, code)
		with open(filePath,"w") as f:
			f.write(error)
			f.write("\n\n")
			f.write(code)
		f.close()
		error2 = error.replace('\n',' ')
		#print(error2)
		os.chmod(temp_marks_path,0o666)
		os.chmod(temp_ip_path,0o666)
		os.chmod(temp_user_op_path,0o666)
		os.chmod(temp_ip_path,0o666)
		# To delete the temporary files :
		deleteErrorFile(temp_marks_path)
		deleteErrorFile(temp_ip_path)
		deleteErrorFile(temp_user_op_path)
		deleteErrorFile(temp_op_path)
		return [0,error2,'']

#compilation process starts here code
def process(filename,filename1,filename2,section,srn,assignmentNumber,qno,inputfile,actualOp,marks):
	
	# calling the compiler code
	ret = compile(filename,filename1,filename2,section,assignmentNumber,qno,srn,inputfile,actualOp,marks)
	# IMP : FOR PYTHON, INSERT ONLY IF THERE ARE NO RUNTIME ERRORS
	if(ret[2] != '') :
		insert(srn,section,int(assignmentNumber),qno,(ret[2][2]))
	else:
		insert(srn,section,int(assignmentNumber),qno,0)
	return ret


import json

# reading the command line arguments
section=sys.argv[1]
section=section.upper()
srn=sys.argv[2]
srn=srn.upper()
asgnNum=sys.argv[3]
qno=sys.argv[4]
filename=sys.argv[5]
filename1 = sys.argv[6]
filename2 = sys.argv[7]

# starting the whole compilation process
total = process(filename,filename1,filename2,section,srn,asgnNum,qno,"inp1.txt","op1.txt","marks1.txt")


if(total[0]==1):
	query = json.dumps({'SRN': srn, 'ANO': asgnNum,'Status Code' : total[0], 'Marks':total[2]})
	query = json.loads(query)
	#print(query)
	#print("Number of Test Cases Passed : \n",len((total[2][0])))
	#print("Test Cases Passed : \n",total[2][0])
else:
	query = json.dumps({'SRN': srn, 'ANO': asgnNum,'Status Code' : total[0], 'Error':total[1]})
	query=json.loads(query)
	#print(query)
	print("RUNTIME ERROR\n")
	print("The following Error was thrown: ",total[1])

