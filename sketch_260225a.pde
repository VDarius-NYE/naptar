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
void draw() {
  float inc = TWO_PI/16;
  float alfa=0;
  for (int i = 0; i < 16; i++) {
    myLine(200, 200, (int) (200+100*cos(alfa)), (int) (200+100*sin(alfa)));
    alfa= alfa + inc;
  }
}
