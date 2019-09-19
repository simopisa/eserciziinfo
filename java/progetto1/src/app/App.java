package app;

public class App {
    static int x;
    public static void main(String[] args) throws Exception {
       
        myclass c=new myclass("thread1");
        Thread th1=new Thread(c);
        th1.start();
        try {
            th1.join();
        } catch (Exception e) {
            //TODO: handle exception
        }
        Thread th2=new Thread(new myclass("th1"));
        th2.start();
        try {
            th2.join();
        } catch (Exception e) {
            //TODO: handle exception
        }

    }
}