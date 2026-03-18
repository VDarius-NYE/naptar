float t[] [] = {{100,150,100,350},
             {100,350,300,350},
             {300,350,300,150},
             {300,150,100,150},//3
             {100,150,200,50},
             {200,50,300,150},//5
             {250,250,300,250},
             {250,250,250,350},//7
             {120,230,170,230},
             {170,230,170,180},//9
             {120,180,170,180},//10
             {120,180,120,230}
     };
void setup() {
  size(400,400);
  background(255);
}
void myLine(int x0, int y0, int x1, int y1){
  if (x0>x1) { myLine(x1,y1,x0,y0);return; }
  if (x0==x1&&y0<=y1) {for(int y=y0;y<=y1;y++)point(x0,y);return; }
  if (x0==x1&&y0>y1) {for(int y=y1;y<=y0;y++)point(x0,y);return; }
  if (x1-x0>=abs(y1-y0)) {
  float m=(float)(y1-y0)/(x1-x0);
  float b=y0-m*x0, y;
  for(int x=x0;x<x1;x++) {
    y = m*x+b;
    //println("x: "+x+ "; y: "+y);
    point(x,y);
  }}
}


int n=0;
void draw() {
  background(255);
  for(int i=0;i<t.length;i++)
    myLine((int)t[i][0],(int)t[i][1],(int)t[i][2],(int)t[i][3]);
    
  
}
float b = 0.2;

void keyPressed(){
  if(key==CODED){
      if(keyCode==RIGHT)
        for(int i=0;i<t.length;i++)
        {
          {t[i][0]++;t[i][2]++;};
        }
      if(keyCode==LEFT)
        for(int i=0;i<t.length;i++)
        {
           t[i][0]--;
           t[i][2]--;;
        }  
      if(keyCode==UP)
        for(int i=0;i<t.length;i++)
        {
          {t[i][1]--;t[i][3]--;};
        }  
      if(keyCode==DOWN)
        for(int i=0;i<t.length;i++)
        {
          {t[i][1]++;t[i][3]++;};
        }  
        
  }else {
    
    if(key=='n')
      for(int i=0;i<t.length;i++)
        for(int j=0;j<4;j++)
          t[i][j]= (t[i][j] -200)*1.01+200;
          
     if(key=='k')
      for(int i=0;i<t.length;i++)
        for(int j=0;j<4;j++)
          t[i][j]=(t[i][j]-200)*.99+200;    
          
  }
  if(key=='t'){
    for(int i = 0; i<t.length;i++){
      for(int j =0; j<2; j++){
        t[i][j*2]=-t[i][j*2]+200;
      
      }
    
    }
     
  }
  if(key=='c')
      for(int i=0;i<t.length;i++)
        for(int j=0;j<4;j++)
          t[i][j]=400-t[i][j];
 
  if(key=='f')
      for(int i=0;i<t.length;i++){
        float x = t[i][0];
        t[i][0]=(t[i][0]-400)*cos(b)-t[i][1]*sin(b); 
        t[i][1]=(x-400)*sin(b)+t[i][1]*cos(b);
        x=t[i][2];
        t[i][2]=(t[i][2]-400)*cos(b)-t[i][3]*sin(b); 
        t[i][3]=(x-400)*sin(b)+t[i][3]*cos(b);
      }     
  
}
