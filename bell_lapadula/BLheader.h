#include<vector>
#include<string>
#include<stdio.h>
#include<stdlib.h>
#include<iostream>
#include<fstream>
#include<sstream>

using namespace std;

//int instructCheck(string input);


//***************
//class
//********************

//Class subjects

class Subjects
{
	string subName;
	int subValue;
	
	
	public:
		void setSubValue(int value);
		int getSubValue();
		string getSubName();
		Subjects(string);
};

//object calss
//has name and vlaue, no security level
//getters setters and constructor
class Objects
{
	string objName;
	int objValue;
	
	public:
		void setObjValue(int value);
		int getObjValue();
		string getObjName();
		Objects(string);
};

class RefMon
{
	vector<Subjects> subjects;
	vector<Objects> objects;
	
	public:
		void createObj(string name);
		void createSub(string name);
		Subjects getSubjects(int num);
		Objects getObjects(int num);
		
		void printState();
		void refMonCheck(string);
		int instructCheck(string input);
};