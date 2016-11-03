/**
*	@author Stephen Longofono
*	@date 11-1-2016
*	@file main.cpp
*	@brief driver for LinkedList demo & testing
*/
#include <iostream>
#include "LinkedListOfInts.h"
#include "Test.h"

int main(int argc, char** argv)
{
	//Example of declaring a LinkedListOfInts
	LinkedListOfInts testableList;

	//You won't do all the tests in main; that's what your Test class will be for
	//Example:
	//TestSuite myTester;
	//myTester.runTests();

	Test tester;


	std::cout << "Beginning tests..." << std::endl;
	tester.run();
	std::cout << "Tests complete" << std::endl;
	return (0);

}

