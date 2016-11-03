#ifndef TESTB
#define TESTB

#include <iostream>
#include <string>
#include <fstream>
#include "List.h"
#include "LinkedListOfInts.h"
class Test{
	public:
		Test();
		~Test();
		int getNumTests();
		int getTestsPassed();
		void run();
		void printVec(std::vector<int> v);

	private:
		int numTests;
		int testsPassed;
		std::ofstream logfile;
		std::string filename;
		bool testValue(bool a, bool b);
		bool testValue(int a, int b);
		bool testValue(double a, double b);
		bool testValue(std::string a, std::string b);
		bool beginLog();
		void endLog();
		void logEntry(std::string s);
};
#endif
