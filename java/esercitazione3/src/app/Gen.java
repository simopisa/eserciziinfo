package app;

/**
 * Gen
 */
public class Gen implements Runnable {

    @Override
    public void run(){
        int tot=0;
        for (int i = 0; i <= 200; i+=2) {
            System.out.println(i);
            tot=tot+i;
        }
        System.out.println("totale = "+tot);
    }

}