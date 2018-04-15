//#include "my_global.h"
#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include <string.h>
//#include "mysql.h"


int main(int argc, char const *argv[]) {

  //ok first lets take in arguments for the matrices dimensions
  //one argument: N
  if (argc == 1) {
    //there was no argument given
    printf("%s\n","no argument was given please execute file with appropriate argument" );
   // printf("%s\n","why here");
    return 0;
  }

  else{
      //lets include some sql_connector stuff
      /*
      MYSQL *con; //mysql connection
      MYSQL_RES *mysql_result; //result set
      MYSQL_ROW row;
      char *server = "127.0.0.1"; //server name
      char *user = "root"; //username
      char *password = "myPassword"; //password
      char *database = "Database";
      char query[100];
      struct tm *newTime;
      time_t ltime;
      char *asctime(const struct tm *time); //get time for sql
      time(&ltime);
      newTime = localtime(&ltime);
      
      //get connection
      con = mysql_init(NULL);
      //test connection
      if(!mysql_real_connect(con,server,user,password,database,0,NULL,0)){
          perror(mysql_error(con));
          printf("fuck here");
          exit(-1);
      }
      
      //truncate the table
      strcpy(query,"truncate table performance");
      if(mysql_query(con,query)){   //returns non-zero if failure | 0 if success
          perror(mysql_error(con));
          exit(-2);
      }*/
      
    //we now have our N!!!!
   // printf("%s\n","here?");
    int n = 0;
    n = atoi(argv[1]);
    srand(time(0));
    //printf("%s\n","yeah");
  //now lets create the matrices
  //first matrix
  //values should be double
  double matrix1[n][n];
  //second matrix
  double matrix2[n][n];
  //and the third matrix to hold the answer
  double result[n][n];
  //lets now initialize both matrices
  int i;
  int j;
  for(i = 0; i < n; i++){
    for(j = 0; j < n; j++){
      double value = rand() % 10 + 0;
      matrix1[i][j] = value;
    }
  }

  srand(1);
  int x;
  int y;
  for(x = 0; x < n; x++){
    for(y = 0; y < n; y++){
      double value = rand() % 10 + 0;
      matrix2[x][y] = value;
    }
  }

  //now lets open a file to write the results to!!!
  //results = n and time it took to compute
  FILE *fp;
  fp = fopen("lab1.txt","a");

  //to get the time i have to start the clock
  struct timeval  tv1, tv2;
  gettimeofday(&tv1, NULL);

  //now lets perform some calculations and time it!!!
  int q; //rows
  int w; //columns
  int e;
  //the first matrices row should be the last thing to change within a cylcy
  //the second matrices column should be the second thing to change
  //and the column of the first and row of the second matrices should change first in tangent
  for(q = 0; q < n; q++){
    for(w = 0; w < n; w++){
      for(e = 0; e < n; e++){
        result[q][w] += matrix1[q][e] * matrix2[e][w];
      }
    }
  }

  //take the time again
  gettimeofday(&tv2, NULL);
  //find time delta
  float microseconds = (float) (tv2.tv_usec - tv1.tv_usec);
  float mgflps = 0;
  if(microseconds > 0){
      mgflps = (float) ((n/n)/microseconds)*n;
  }
  /*
  
  //write our findings to Plogs
  sprintf(query,"insert into performance (timestamp,size,mgflps,elapsedtime) values (\"%s\",%d,%f,%f)",  asctime(newTime),n,mgflps,microseconds);
  if(mysql_query(con,query)){
      perror(mysql_error(con));
      exit(-2);
  }
    */
  //now lets write our findings ( N and time delta ) to lab1.log
  printf("%d %.2f\n",n,microseconds );
  //fprintf(fp, "%d %.2f\n",n,microseconds );
  //printf("%d %.2f\n",n,microseconds );
  fclose(fp);
  //mysql_close(con);

  return 0;
}



}
