package app;

public class App {
    public static void main(String[] args) throws Exception {
       Cont contatore=new Cont();
       Thread th1=new Thread(contatore);
       th1.start();
       

    }
}