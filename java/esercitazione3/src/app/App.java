package app;

public class App {
    public static void main(String[] args) throws Exception {
        Gen g = new Gen();
        Thread th1= new Thread(g);
        th1.start();
    }
}