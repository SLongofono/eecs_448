#include "Test.h"

Test::Test(){
	filename = "testLog.txt";
	numTests = 0;
	testsPassed = 0;
}

Test::~Test(){
	endLog();
}

void Test::printVec(std::vector<int> v){
	std::cout << "[";
	for(int i = 0; i < signed(v.size()) - 1; i++){
		std::cout << v.at(i) << ", ";
	}
	std::cout << v.back() << "]" << std::endl;
}

void Test::run(){
	LinkedListOfInts* myList = new LinkedListOfInts();
	std::cout << "Outputting results to " << filename << std::endl << std::endl;
	if(!beginLog()){
		std::cout << "Failed to open logfile, exiting..." << std::endl;
		return;
	}

	logEntry("********Size testing********\n");

	if(testValue(0,myList->size())){
		logEntry("Test passed: initial list size zero");
		testsPassed++;
	}
	else{
		logEntry("Test failed: initial list size non-zero");
	}

	if(testValue(true, myList->isEmpty())){
		logEntry("Test passed: empty list is empty");
		testsPassed++;
	}
	else{
		logEntry("Test failed: empty list is empty");
	}

	if(testValue(false, myList->removeBack())){
		logEntry("Test passed: removeBack() on empty list returns false");
		testsPassed++;
	}
	else{
		logEntry("Test failed: removeBack() on empty list returns false");
	}

	if(testValue(false, myList->removeFront())){
		logEntry("Test passed: removeFront() on empty list returns false");
		testsPassed++;
	}
	else{
		logEntry("Test failed: removeFront() on empty list returns false");
	}

	myList->addBack(1);
	int temp = myList->size();
	if(testValue(1, temp)){
		logEntry("Test passed: size updates correctly after addBack");
		testsPassed++;
	}
	else{
		logEntry("Test failed: size updates correctly after addBack");
	}


	myList->addFront(0);
	temp = myList->size();
	if(testValue(2, temp)){
		logEntry("Test passed: size updates correctly after addFront");
		testsPassed++;
	}
	else{
		logEntry("Test failed: size updates correctly after addFront");
	}


	if(testValue(false, myList->isEmpty())){
		logEntry("Test passed: non-empty list, isEmpty() returns False");
		testsPassed++;
	}
	else{
		logEntry("Test failed: non-empty list, isEmpty() returns False");
	}


	int beforeSize = myList->size();
	bool ret = myList->removeBack();
	temp = myList->size();

	if(ret){
		if(testValue(beforeSize, temp+1)){
			logEntry("Test passed: removeBack() updates size correctly");
			testsPassed++;
		}
		else{
			logEntry("Test failed: removeBack() updates size correctly");
		}
	}
	else{
		if(beforeSize > 0){
			testValue(1,0); //Always fails, forcing numTests to increment
			logEntry("Test failed: removeBack() returns true on non-empty list");
			if(testValue(beforeSize, temp+1)){
				logEntry("Test passed: removeBack() updates size correctly");
				testsPassed++;
			}
			else{
				logEntry("Test failed: removeBack() updates size correctly");
				std::cout << "Test failed: removeBack() updates size correctly" << std::endl;
				std::cout << beforeSize << " was decremented to " << temp << std::endl << std::endl;
			}
		}
	}

	beforeSize = myList->size();
	ret = myList->removeFront();
	temp = myList->size();
	if(ret){
		if(testValue(beforeSize, temp+1)){
			logEntry("Test passed: removeFront() updates size correctly");
			testsPassed++;
		}
		else{
			logEntry("Test failed: removeFront() updates size correctly");
		}
	}
	else{
		if(beforeSize > 0){
			testValue(1,0); //Always fails, forcing numTests to increment
			logEntry("Test failed: removeFront() returns true on non-empty list");
			if(testValue(beforeSize, temp+1)){
				logEntry("Test passed: removeFront() updates size correctly");
				testsPassed++;
			}
			else{
				logEntry("Test failed: removeFront() updates size correctly");
			}
		}
	}

	// I know I'm not supposed to do this but I wanted to test that it was actually doing something...
	myList->~LinkedListOfInts();

	// Dig deeper into add/remove
	myList = new LinkedListOfInts();
	logEntry("\n\n********Add/Remove Testing********\n");

	ret = myList->search(0);
	if(testValue(false, ret)){
		logEntry("Test passed: search on an empty list returns false");
		testsPassed++;
	}
	else{
		logEntry("Test failed: search on an empty list returns false");
	}


	myList->addFront(1);
	ret = myList->search(1);
	// List is now [1]
	if(testValue(true, ret)){
		logEntry("Test passed: search on an element in a list returns true");
		testsPassed++;
	}
	else{
		logEntry("Test failed: search on an element in a list returns true");
	}

	ret = myList->search(99);
	if(testValue(false, ret)){
		logEntry("Test passed: search on element which does not exist returns false");
		testsPassed++;
	}
	else{
		logEntry("Test failed: search on element which does not exist returns false");
	}

	std::vector<int> myVec = myList->toVector();
	if(testValue(1, myVec.at(0))){
		logEntry("Test passed: addFront() actually adds an element");
		testsPassed++;
	}
	else{
		logEntry("Test failed: addFront() actually adds an element");
		std::cout<< "Test failed: addFront() actually adds an element" <<std::endl;
		std::cout << "Expected value: [1]      Returned value: ";
		printVec(myVec);
		std::cout << std::endl;
	}

	if(testValue(1, myVec.size())){
		logEntry("Test passed: addFront() adds only a single element");
		testsPassed++;
	}
	else{
		logEntry("Test failed:  addFront() adds only a single element");
		std::cout<< "Test failed:  addFront() adds only a single element" <<std::endl;
		printVec(myVec);
		std::cout << std::endl;
	}

	myList->addFront(0);
	myVec = myList->toVector();
	// List is now [0,1]
	if(testValue(0, myVec.at(0))){
		logEntry("Test passed: addFront() places items at front of list");
		testsPassed++;
	}
	else{
		logEntry("Test failed: addFront() places items at front of list");
		std::cout<< "Test failed: addFront() places items at front of list" <<std::endl;
		std::cout << "Expected value: [0, 1]      Returned value: ";
		printVec(myVec);
		std::cout << std::endl;
	}

	beforeSize = myList->size();
	myList->removeFront();
	myVec = myList->toVector();
	temp = myList->size();
	// List is now [1]
	if(testValue(1, myVec.at(0))){
		logEntry("Test passed: removeFront() correctly removes an item from the front");
		testsPassed++;
	}
	else{
		logEntry("Test failed: removeFront() correctly removes an item from the front");
		std::cout<< "Test failed: removeFront() correctly removes an item from the front" <<std::endl;
		std::cout << "Expected value: [1]      Returned value: ";
		printVec(myVec);
		std::cout << std::endl;
	}


	if(testValue(1, myList->size())){
		logEntry("Test passed: removeFront() on non-empty list updates size correctly");
		testsPassed++;
	}
	else{
		logEntry("Test failed: removeFront() on non-empty list updates size correctly");
		std::cout << "Test failed: removeFront() on non-empty list updates size correctly";
		std::cout<< beforeSize << " was decremented to " << temp << std::endl;
		std::cout << std::endl;
	}

	myList->addBack(2);
	myVec = myList->toVector();
	// List is now [1,2]
	if(testValue(2, myVec.at(1))){
		logEntry("Test passed: addBack() places items at the rear of list");
		testsPassed++;
	}
	else{
		logEntry("Test failed: addBack() places items at the rear of list");
		std::cout<< "Test failed: addBack() places items at the rear of list" <<std::endl;
		std::cout << "Expected value: [1,2]      Returned value: ";
		printVec(myVec);
		std::cout << std::endl;
	}

	ret = myList->removeBack();
	// List is now [1]
	if(testValue(true, ret)){
		logEntry("Test passed: removeBack() returns true on non-empty list");
		testsPassed++;
	}
	else{
		logEntry("Test failed: removeBack() returns true on non-empty list");
	}

	// This test is written assuming that the removeFront is broken (does nothing), and that addBack is adding to front.
    	// Thus the expected progression is : [1] -> [0,1] -> [1] -> [2,0]
	myVec = myList->toVector();
	if(testValue(0, myVec.at(1))){
		logEntry("Test passed: removeBack() correctly removes an item from the rear");
	}
	else{
		logEntry("Test failed: removeBack() correctly removes an item from the rear");
		std::cout<< "Test failed: removeBack() correctly removes an item from the rear" <<std::endl;
		std::cout << "Expected [1,2] -> [1]" << std::endl;
		printVec(myVec);
		std::cout << std::endl;
	}


	std::cout << "\n\n********Trial Comparison Run********" << std::endl;
	std::cout << "Creating a list [1,2,3] with addFront()" << std::endl;
	LinkedListOfInts* tempList = new LinkedListOfInts();
	tempList->addFront(3);
	tempList->addFront(2);
	tempList->addFront(1);
	std::cout << "New list size: " << tempList->size() << std::endl;
	myVec = tempList->toVector();
	printVec(myVec);

	std::cout << std::endl << "Emptying list with removeFront()" << std::endl;
	tempList->removeFront();
	tempList->removeFront();
	tempList->removeFront();
	std::cout << "New list size: " << tempList->size() << std::endl;
	myVec = tempList->toVector();
	printVec(myVec);

	std::cout<< std::endl << "Creating list [1,2,3] with addBack()" << std::endl;
	tempList->addBack(1);
	tempList->addBack(2);
	tempList->addBack(3);
	std::cout << "New list size: " << tempList->size() << std::endl;
	myVec = tempList->toVector();
	printVec(myVec);

	std::cout << std::endl << "Emptying list with removeBack()" << std::endl;
	tempList->removeBack();
	tempList->removeBack();
	tempList->removeBack();
	std::cout << "New list size: " << tempList->size() << std::endl;
	myVec = tempList->toVector();
	printVec(myVec);

	// Report statistics and clean up
	myList->~LinkedListOfInts();
	std::cout << std::endl << "Tests passed: " << getTestsPassed() << std::endl;
	std::cout << "Number of tests: " << getNumTests() << std::endl;
	std::cout << "Percentage: " << ((getTestsPassed()*1.0)/(getNumTests()))*100 << "%" << std::endl;
	endLog();
}

bool Test::beginLog(){
	logfile.open(filename);
	return logfile.good();
}

void Test::endLog(){
	logfile.close();
}

void Test::logEntry(std::string s){
	logfile << s << std::endl;
}

int Test::getNumTests(){
	return numTests;
}

int Test::getTestsPassed(){
	return testsPassed;
}

bool Test::testValue(bool a, bool b){
	numTests++;
	return (a == b);
}

bool Test::testValue(int a, int b){
	numTests++;
	return (a == b);
}

bool Test::testValue(double a, double b){
	numTests++;
	return (a == b);
}

bool Test::testValue(std::string a, std::string b){
	numTests++;
	return (a == b);
}
