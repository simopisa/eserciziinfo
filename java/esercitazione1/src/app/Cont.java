package app;

/**
 * Cont
 */
public class Cont implements Runnable{
    @Override
    public void run(){
        for (int i = 10; i >= 0; i--) {
            System.out.println(i);
        }
    }
    
}