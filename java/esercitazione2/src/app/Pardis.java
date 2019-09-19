package app;

/**
 * ParDis
 */
public class Pardis implements Runnable{
    @Override
    public void run(){
        for (int i = 100; i >=0; i--) {
            if (i%2==0) {
                System.out.println(i+"--> PARI");
            } else {
                System.out.println(i+"--> DISPARI");
            }
        }
    }
    
}