package app;

public class App {
    public static void main(String[] args) throws Exception {
        Pardis pd = new Pardis();
        Thread th1=new Thread(pd);
        th1.start();
    }
}