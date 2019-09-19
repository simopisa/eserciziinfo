package app;

/**
 * myclass
 */
public class myclass implements Runnable{
    private String nome;

    public myclass(String nome){
        this.nome=nome;

    }
    @Override
    public void run(){
        for (int i = 0; i < 10; i++) {
            try {
                Thread.sleep(1000);
            } catch (Exception e) {
                
            }
            App.x++;
            System.out.println("nome thread: "+nome+"i="+ i +"main"+App.x);
        }
    }
    

    
}