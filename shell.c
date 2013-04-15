#include <unistd.h>
#include <signal.h> 

int main(){
	char* line = malloc(1024);
	read(0, line, 1024);
	write(1, line, 1024);
	return 0;
}
