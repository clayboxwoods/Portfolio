#include<iostream>
#include<string>
#include<fstream>
#include<algorithm>
#include<cctype>
#include<cmath>
#include<bitset>
#include<sstream>
#include<vector>
using namespace std;


int XOR(int value, int key)
{
	int answer;
	answer = (value ^ key);
	return answer;
}

int rgfMul(int intCol, int x)
{
	int oldCol = intCol;
	if(x==2)
	{
		intCol = (intCol <<1);
		if(intCol > 255)
		{
			intCol = (intCol ^ 27)-256;
		}
		return intCol;
	}
	else if(x==3)
	{
		intCol = (intCol <<1);
		intCol = XOR(intCol,oldCol);
		if(intCol > 255)
		{
			intCol = (intCol ^ 27)-256;
		}
		return intCol;
	}
	
	return 0;
}



long long convertToBinary(int num)
{
    long long binaryNumber = 0;
    int remainder, i = 1, step = 1;

    while (num!=0)
    {
        remainder = num%2;
        num /= 2;
        binaryNumber += remainder*i;
        i *= 10;
    }
    return binaryNumber;
}


int convertToDecimal(int num)
{
    int decimalNumber = 0, i = 0, remainder;
    while (num!=0)
    {
        remainder = num%10;
        num /= 10;
        decimalNumber += remainder*pow(2,i);
        ++i;
    }
    return decimalNumber;
}


int main()
{
	int temp, count;
	string plainTxtFileName,keyFileName, outputFileName;
	//int size = 256;
	string key, plainLine,line,tempStr;
	vector<string> parity;
	vector<int> columns;
	
	//prompt user for plain text file and key file
	cout << "What is the plain text file: " <<endl;
	cin >> plainTxtFileName;
	cout << "What is the key file: " <<endl;
	cin >> keyFileName;
	cout << "What is the output file: " << endl;
	cin >> outputFileName;
	
	ofstream outputFile(outputFileName.c_str());
	//open key file read line and put into string
	ifstream keyFile(keyFileName.c_str());
	
	//if cant open
	if(!keyFile.is_open())
	{
		cout << "Cannot open file!!";
		return 1;
	}
	//else getline and put it into key variable
	else
		getline(keyFile, key);
	
	keyFile.close();
	
	//open plaintext file
	ifstream plainFile(plainTxtFileName.c_str());
	
	//if cant open
	if(!plainFile.is_open())
	{
		cout << "Cannot open file!!";
		return 1;
	}
	//else getline and put it into plainLine variable
	else
	{
		while(getline(plainFile, line))
		{
			//getline(plainFile, line);
			plainLine.append(line);
			
		}
		
		//while()
		//{
			
			if(plainLine.length() == 0){cout << "ERROR when pulling from file"<<endl;}
			else
			{
				//do stuff
				
				//*********************
				//pre-processing
				//*********************
				plainLine.erase(remove(plainLine.begin(), plainLine.end(), '\n'), plainLine.end());
				plainLine.erase(remove(plainLine.begin(), plainLine.end(), ' '), plainLine.end());
				plainLine.erase(remove(plainLine.begin(), plainLine.end(), '.'), plainLine.end());
				plainLine.erase(remove(plainLine.begin(), plainLine.end(), ','), plainLine.end());
				plainLine.erase(remove(plainLine.begin(), plainLine.end(), '!'), plainLine.end());
				plainLine.erase(remove(plainLine.begin(), plainLine.end(), '?'), plainLine.end());
				plainLine.erase(remove(plainLine.begin(), plainLine.end(), '"'), plainLine.end());
				plainLine.erase(remove(plainLine.begin(), plainLine.end(), '('), plainLine.end());
				plainLine.erase(remove(plainLine.begin(), plainLine.end(), ')'), plainLine.end());
				plainLine.erase(remove(plainLine.begin(), plainLine.end(), '&'), plainLine.end());
				plainLine.erase(remove(plainLine.begin(), plainLine.end(), '%'), plainLine.end());
				
				
				outputFile << "Pre-Processing: \t" << plainLine <<endl;
				
				outputFile << "\n************************************************************************************************************************************\n\n";
				
				//**************************
				//substitution
				//**************************
				
				int k=0;
				//make key the same length at plaintext
				if(key.length() > plainLine.length())
				{
					int temp = key.length() - plainLine.length();
					key = key.substr(0,(key.size()-temp));
					
				}
				else if(key.length() < plainLine.length())
				{
					for(int i=key.length(); i<plainLine.length(); i++)
					{
						if(key.length() != plainLine.length())
						{
							char temp = key[k];
							key += temp;
							k++;
						}
						
					}
				}
				
				
				//cout << key << endl;
				
				int subTxtNum;
				string subTxt;
				for(int i=0; i<plainLine.length(); i++)
				{
					
					subTxt += (((plainLine[i] - 'A') + (key[i] - 'A')) % 26)+65;
					//cout << "plainLine[i]: " << plainLine[i] << "\tkey[i]: " << key[i] <<endl;
					//cout << "Added: " << (((plainLine[i] - 'A') + (key[i] - 'A')) % 26)+65 <<endl;
				}
				
				outputFile << "substitution: \t" << subTxt << endl;
				
				outputFile << "\n************************************************************************************************************************************\n\n";
				
				//*********************************************************
				//padding
				//*********************************************************
				
				while((subTxt.length())%16 != 0)
				{
					subTxt += 'A';
				}
				//cout << "Padding: " << subTxt << endl;
				//cout << "length: " << subTxt.length() << endl;
				outputFile << "Padding: \t" << subTxt << endl;
				
				outputFile << "\n************************************************************************************************************************************\n\n";
				
				//**********************************************
				//shift row
				//************************************************
				
					
				int size = subTxt.length()/16;
				
				char shiftRow[size][4][4];
				k=0;
				
				for(int x=0;x<size;x++)
				{
					for(int i=0;i<4;i++)
					{
						for(int j=0;j<4;j++)
						{
							shiftRow[x][i][j] = subTxt[k];
							k++;
						}
					}
				}
				
				k=0;
				char tempChar,tempChar2,tempChar3;
				
				
				for(int x=0;x<size;x++)
				{
					for(int i=0;i<4;i++)
					{
						
						for(int j=0;j<4;j++)
						{
							if(i==0){}
							else if(i==1)
							{
								if(j==0)
									tempChar = shiftRow[x][i][j];
								if(j!=3)
									shiftRow[x][i][j] = shiftRow[x][i][j+1];
								else
									shiftRow[x][i][j] = tempChar;
							}
							else if(i==2)
							{
								if(j==0)
									tempChar = shiftRow[x][i][j];
								if(j==1)
									tempChar2 = shiftRow[x][i][j];
								if(j!=3 && j!=2)
									shiftRow[x][i][j] = shiftRow[x][i][j+2];
								else if(j==2)
									shiftRow[x][i][j] = tempChar;
								else
									shiftRow[x][i][j] = tempChar2;
							}
							else if(i==3)
							{
								if(j==0)
									tempChar = shiftRow[x][i][j];
								if(j==1)
									tempChar2 = shiftRow[x][i][j];
								if(j==2)
									tempChar3 = shiftRow[x][i][j];
								if(j==0)
									shiftRow[x][i][j] = shiftRow[x][i][j+3];
								else if(j==1)
									shiftRow[x][i][j] = tempChar;
								else if(j==2)
									shiftRow[x][i][j] = tempChar2;
								else
									shiftRow[x][i][j] = tempChar3;
							}
							
							
						}
					}
				}
				
				
				k=0;
				
				outputFile << "Shift Rows: "; 
				
				for(int x=0;x<size;x++)
				{
					for(int i=0;i<4;i++)
					{
						for(int j=0;j<4;j++)
						{
							
							if(k%16 == 0){outputFile << endl;}
							//cout << "shiftRow[" << x << "][" << i <<"][" << j << "]: "<< shiftRow[x][i][j];
							outputFile << shiftRow[x][i][j];
							k++;
							if(j==3){outputFile << endl;}
						}
					}
				}
				
				outputFile << endl;
				
				
				outputFile << "\n************************************************************************************************************************************\n\n";
				
				
				//***********************************************************************
				//parity bit
				//***********************************************************************
				
				int b=0;
				
				for(int x=0;x<size;x++)
				{
					for(int i=0;i<4;i++)
					{
						for(int j=0;j<4;j++)
						{
							//convert to int, then to binary_function
							//count number of '1'
							//if odd add '1' in 8th spot (128)
							//if even do nothing
							//convert to hex
							temp = shiftRow[x][i][j];
							temp = convertToBinary(temp);
							
							//string tempStr = to_string(10); //not supported on cse matchines >:(
							ostringstream ss;
							ss << temp;
							
							count =0;
							for(int k=0;k<8;k++)
							{
								if(ss.str()[k] == '1')
									count++;
							}
							
							
							if(count%2 != 0)
							{
								temp += 10000000;
							}
							
							temp = convertToDecimal(temp);
							
							columns.push_back(temp);
							
							//need a new ss or wont work
							stringstream ss2;
							ss2 << hex << temp;
							
							tempStr = ss2.str();
							
							
							parity.push_back(ss2.str());							
							
							//cout << "shiftRow[x][i][j]: " << shiftRow[x][i][j] <<endl;
						}
					}
				}
				
				outputFile << "parity bit" << endl;
				
				for(int k=0; k<parity.size();k++)
				{
					outputFile << parity[k] << " ";
					if((k+1)%4==0)
						outputFile <<endl;
					if((k+1)%16==0)
						outputFile <<endl;
				}
				
				
				outputFile << "\n************************************************************************************************************************************\n\n";
				
				
				/*
				//***********************************************************
				//mix columns
				//***********************************************************
				
				
				for(int k=0; k<columns.size();k++)
				{
					cout << hex << columns[k] << " ";
					if((k+1)%4==0)
						cout <<endl;
					if((k+1)%16==0)
						cout <<endl;
				}
				
				cout << "\n\n\n";
				*/
				
				int a0=0,a1=0,a2=0,a3=0;
				for(int k=0;k<(columns.size()/16);k++)
				{
					a0=0,a1=0,a2=0,a3=0;
					for(int i=0;i<16;i++)
					{
						
						if (i==0)
						{
							a0 = rgfMul(columns[(k*16)+i],2);
							a1 = columns[(k*16)+i];
							a2 = columns[(k*16)+i];
							a3 = rgfMul(columns[(k*16)+i],3);
						}
						if (i==4) 
						{
							a0 = XOR(rgfMul(columns[(k*16)+i],3),a0);
							a1 = XOR(rgfMul(columns[(k*16)+i],2),a1);
							a2 = XOR(columns[(k*16)+i],a2);
							a3 = XOR(columns[(k*16)+i],a3);
						}
						if (i==8) 
						{
							a0 = XOR(columns[(k*16)+i],a0);
							a1 = XOR(rgfMul(columns[(k*16)+i],3),a1);
							a2 = XOR(rgfMul(columns[(k*16)+i],2),a2);
							a3 = XOR(columns[(k*16)+i],a3);
						}
						if (i==12) 
						{
							a0 = XOR(columns[(k*16)+i],a0);
							a1 = XOR(columns[(k*16)+i],a1);
							a2 = XOR(rgfMul(columns[(k*16)+i],3),a2);
							a3 = XOR(rgfMul(columns[(k*16)+i],2),a3);
						}
												
					}
					columns[(k*16)+0] = a0;
					columns[(k*16)+4] = a1;
					columns[(k*16)+8] = a2;
					columns[(k*16)+12] = a3;
					
					a0=0,a1=0,a2=0,a3=0;
					for(int i=0;i<16;i++)
					{
						
						if (i==1)
						{
							a0 = rgfMul(columns[(k*16)+i],2);
							a1 = columns[(k*16)+i];
							a2 = columns[(k*16)+i];
							a3 = rgfMul(columns[(k*16)+i],3);
						}
						if (i==5) 
						{
							a0 = XOR(rgfMul(columns[(k*16)+i],3),a0);
							a1 = XOR(rgfMul(columns[(k*16)+i],2),a1);
							a2 = XOR(columns[(k*16)+i],a2);
							a3 = XOR(columns[(k*16)+i],a3);
						}
						if (i==9) 
						{
							a0 = XOR(columns[(k*16)+i],a0);
							a1 = XOR(rgfMul(columns[(k*16)+i],3),a1);
							a2 = XOR(rgfMul(columns[(k*16)+i],2),a2);
							a3 = XOR(columns[(k*16)+i],a3);
						}
						if (i==13) 
						{
							a0 = XOR(columns[(k*16)+i],a0);
							a1 = XOR(columns[(k*16)+i],a1);
							a2 = XOR(rgfMul(columns[(k*16)+i],3),a2);
							a3 = XOR(rgfMul(columns[(k*16)+i],2),a3);
						}
						
					}
					
					columns[(k*16)+1] = a0;
					columns[(k*16)+5] = a1;
					columns[(k*16)+9] = a2;
					columns[(k*16)+13] = a3;
					a0=0,a1=0,a2=0,a3=0;
					for(int i=0;i<16;i++)
					{
						
						if (i==2)
						{
							a0 = rgfMul(columns[(k*16)+i],2);
							a1 = columns[(k*16)+i];
							a2 = columns[(k*16)+i];
							a3 = rgfMul(columns[(k*16)+i],3);
						}
						if (i==6) 
						{
							a0 = XOR(rgfMul(columns[(k*16)+i],3),a0);
							a1 = XOR(rgfMul(columns[(k*16)+i],2),a1);
							a2 = XOR(columns[(k*16)+i],a2);
							a3 = XOR(columns[(k*16)+i],a3);
						}
						if (i==10) 
						{
							a0 = XOR(columns[(k*16)+i],a0);
							a1 = XOR(rgfMul(columns[(k*16)+i],3),a1);
							a2 = XOR(rgfMul(columns[(k*16)+i],2),a2);
								a3 = XOR(columns[(k*16)+i],a3);
						}
						if (i==14) 
						{
							a0 = XOR(columns[(k*16)+i],a0);
							a1 = XOR(columns[(k*16)+i],a1);
							a2 = XOR(rgfMul(columns[(k*16)+i],3),a2);
							a3 = XOR(rgfMul(columns[(k*16)+i],2),a3);
						}
						
					}
					
					columns[(k*16)+2] = a0;
					columns[(k*16)+6] = a1;
					columns[(k*16)+10] = a2;
					columns[(k*16)+14] = a3;
					
					a0=0,a1=0,a2=0,a3=0;
					for(int i=0;i<16;i++)
					{
					
						if (i==3)
						{
							a0 = rgfMul(columns[(k*16)+i],2);
							a1 = columns[(k*16)+i];
							a2 = columns[(k*16)+i];
							a3 = rgfMul(columns[(k*16)+i],3);
						}
						if (i==7) 
						{
							a0 = XOR(rgfMul(columns[(k*16)+i],3),a0);
							a1 = XOR(rgfMul(columns[(k*16)+i],2),a1);
							a2 = XOR(columns[(k*16)+i],a2);
							a3 = XOR(columns[(k*16)+i],a3);
						}
						if (i==11) 
						{
							a0 = XOR(columns[(k*16)+i],a0);
							a1 = XOR(rgfMul(columns[(k*16)+i],3),a1);
							a2 = XOR(rgfMul(columns[(k*16)+i],2),a2);
							a3 = XOR(columns[(k*16)+i],a3);
						}
						if (i==15) 
						{
							a0 = XOR(columns[(k*16)+i],a0);
							a1 = XOR(columns[(k*16)+i],a1);
							a2 = XOR(rgfMul(columns[(k*16)+i],3),a2);
							a3 = XOR(rgfMul(columns[(k*16)+i],2),a3);
						}
						
					
					}	 
						
					columns[(k*16)+3] = a0;
					columns[(k*16)+7] = a1;
					columns[(k*16)+11] = a2;
					columns[(k*16)+15] = a3;
				
				}
			
				outputFile << "mix columns" <<endl;
				
				for(int k=0; k<columns.size();k++)
				{
					outputFile << hex << columns[k] << " ";
					if((k+1)%4==0)
						outputFile <<endl;
					if((k+1)%16==0)
						outputFile <<endl;
				}
			
				
				
				
			}
			
			
			
			
			
			plainFile.close();
		//}
		
	}
	
	
	
	
	return 0;
}