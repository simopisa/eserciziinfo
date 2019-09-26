package app;

/**
 * Produttore
 */
public class Produttore implements Runnable {
    private String nome;
    private int volte;

    public Produttore(String nome, int volte){
        this.nome=nome;
        this.volte=volte;
    }
    @Override
    public void run(){
        for (int i = 0; i < volte; i++) {
            App.vuoto.P();
            
            try {
                Thread.sleep(1000);
            } catch (Exception e) {
            }
            System.out.println("Sono "+ nome +" e ho prodotto: "+i);
            App.risorsa=i;  


            
            App.pieno.V();
        }
    }
}
