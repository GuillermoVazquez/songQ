CFLAGS = -std=c99 -pedantic -Wall

all: touch part1
touch:
	touch *.c
part1 : part1.c
	cc -DN=$(SIZE) -o part1 part1.c $(OBJS)
clean: part1.c
	rm ./part1
