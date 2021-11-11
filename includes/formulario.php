<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3">Cadastrar vaga</h2>

    <form method="post">

        <div class="form-group pt-3">
            <label>Título</label>
            <input type="text" class="form-control" name="titulo">
        </div>

        <div class="form-group pt-3">
            <label>Descrição</label>
            <textarea class="form-control" name="descricao" rows="5"></textarea>
        </div>
     
        <div class="form-group pt-3">
            <label>Status</label>

            <div class="pt-1 pb-3"  style="margin-left:-25px ">

                <div class="form-check form-check-inline">  
                    <label class="form-control">
                        <input type="radio" name="ativo" value="s" checked> Ativo
                    </lebel>
                </div>

                <div class="form-check form-check-inline">  
                    <label class="form-control">
                        <input type="radio" name="inativo" value="n"> Inativo
                    </lebel>
                </div>


            </div><!---->

        </div><!--form-group-->

        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>

    </form>

</main>