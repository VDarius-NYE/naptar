import java.util.Stack;

float t[][] = {
  {100, 150, 250, 150}, 
  {250, 150, 250, 100}, 
  {250, 100, 350, 200}, 
  {350, 200, 250, 300}, 
  {250, 300, 250, 250}, 
  {250, 250, 100, 250}, 
  {100, 250, 100, 150}  
};

float[][] tetPoints = {
  { 0,  -50,   0}, 
  {-40,  40, -40}, 
  { 40,  40, -40}, 
  {  0,  20,  50}  
};

int[][] tetEdges = {
  {0, 1}, {0, 2}, {0, 3}, 
  {1, 2}, {2, 3}, {3, 1}  
};

float d = 300; 

void setup() {
  size(400, 400);
  frameRate(30); 
}

void myLine(int x0, int y0, int x1, int y1) {
  int dx = abs(x1 - x0);
  int dy = abs(y1 - y0);
  int sx = (x0 < x1) ? 1 : -1;
  int sy = (y0 < y1) ? 1 : -1;
  int err = dx - dy;

  while (true) {
    point(x0, y0);

    if (x0 == x1 && y0 == y1) break;
    
    int e2 = 2 * err;
    if (e2 > -dy) {
      err -= dy;
      x0 += sx;
    }
    if (e2 < dx) {
      err += dx;
      y0 += sy;
    }
  }
}

void kitoltSorfeltoltes(int startX, int startY) {
  startX = constrain(startX, 1, width - 2);
  startY = constrain(startY, 1, height - 2);

  int celSzin = color(255); 
  if (get(startX, startY) != celSzin) return;

  Stack<PVector> verem = new Stack<PVector>();
  verem.push(new PVector(startX, startY));
  
  stroke(139, 195, 74); 

  while (!verem.isEmpty()) {
    PVector p = verem.pop();
    int x = (int)p.x;
    int y = (int)p.y;

    if (get(x, y) != celSzin) continue;

    int balX = x;
    while (balX >= 0 && get(balX, y) == celSzin) {
      balX--;
    }
    balX++; 

    int jobbX = x;
    while (jobbX < width && get(jobbX, y) == celSzin) {
      point(jobbX, y);
      jobbX++;
    }
    jobbX--; 

    if (y - 1 >= 0) {
      boolean ujSzakasz = false;
      for (int i = balX; i <= jobbX; i++) {
        if (get(i, y - 1) == celSzin) {
          if (!ujSzakasz) {
            verem.push(new PVector(i, y - 1));
            ujSzakasz = true;
          }
        } else {
          ujSzakasz = false;
        }
      }
    }

    if (y + 1 < height) {
      boolean ujSzakasz = false;
      for (int i = balX; i <= jobbX; i++) {
        if (get(i, y + 1) == celSzin) {
          if (!ujSzakasz) {
            verem.push(new PVector(i, y + 1));
            ujSzakasz = true;
          }
        } else {
          ujSzakasz = false;
        }
      }
    }
  }
}

void mozgat() {
  for (int i = 0; i < t.length; i++) {
    t[i][0] += 2; 
    t[i][2] += 2; 
  }
  if (t[6][0] > width) {
    for (int i = 0; i < t.length; i++) {
      t[i][0] -= 450;
      t[i][2] -= 450;
    }
  }
}

void rajzolTetraeder() {
  stroke(0); 
  float[][] points2D = new float[4][2];
  
  for (int i = 0; i < 4; i++) {
    float X = tetPoints[i][0];
    float Y = tetPoints[i][1];
    float Z = tetPoints[i][2];

    points2D[i][0] = (X * d) / (Z + d) + tetraederX;
    points2D[i][1] = (Y * d) / (Z + d) + 200;
  }
  
  for (int i = 0; i < tetEdges.length; i++) {
    int p0 = tetEdges[i][0];
    int p1 = tetEdges[i][1];
    
    myLine(
      round(points2D[p0][0]), round(points2D[p0][1]),
      round(points2D[p1][0]), round(points2D[p1][1])
    );
  }
}

void draw() {
  background(255);
  
  stroke(0);
  line(0, 0, width-1, 0);
  line(0, height-1, width-1, height-1);
  line(0, 0, 0, height-1);
  line(width-1, 0, width-1, height-1);
  
  for (int i = 0; i < t.length; i++) {
    myLine((int) t[i][0], (int) t[i][1], (int) t[i][2], (int) t[i][3]);
  }
  float dSeedX = (t[0][0] + t[0][2]) / 2;
  float dSeedY = (t[0][1] + t[5][1]) / 2;
  kitoltSorfeltoltes((int)dSeedX, (int)dSeedY);
  
  rajzolTetraeder();
  
  mozgat(); 
}

float tetraederX = 300;

void keyPressed() {
  if (key == 'x' || key == 'X') {
    tetraederX -= 5;
  }
  
  if (key == 'y' || key == 'Y') {
    float b = 0.1;
    

    for (int i = 0; i < tetPoints.length; i++) {
      float y_old = tetPoints[i][1];
      float z_old = tetPoints[i][2];
      
      tetPoints[i][1] = y_old * cos(b) - z_old * sin(b);
      tetPoints[i][2] = y_old * sin(b) + z_old * cos(b);
    }
  }
}
