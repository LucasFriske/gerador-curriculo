<!DOCTYPE html>

<html>  
    <head>  
         <title>Gerador de Currículo</title>
        <meta charset="UTF-8">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  
        <script src="_JavaScript/script.js"></script>

        <link rel="stylesheet" href="style.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
   <body class="bg-dark">
    <body>
         <div class="container py-5">
            <div class="card shadow-1g p-4">
                <h1 class="text-center mb-4">Gerador de Currículo</h1>
                    <form action="gerar.php" method="POST" enctype="multipart/form-data">

                       <!-- Dados Pessoais -->
                        <h4 class="border-bottom pb-2 mb-3">Dados Pessoais</h4>
                            <div class="mb-3">
                                <label class="form-label">Nome completo:</label>
                                <input type="text" name="nome" class="form-control" required>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label class="form-label">Data de nascimento:</label>
                                    <input name="nascimento" id="nascimento" type="date" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Idade:</label>
                                <input id="idade" name="idade" type="text" class="form-control" readonly placeholder="Calculada automaticamente">
                            </div>
                            </div>

                            <div class="row">
                                <div class="col-md4 mb-3">
                                    <label class="form-label">E-mail:</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md4 mb-3">
                                <label class="form-label">Telefone:</label>
                                <input type="text" name="telefone" class="form-control" required> <!-- add limitador de digitos -->
                            </div>

                                <div class="mb-3">  
                                    <label class="form-label">Endereço:</label>
                                    <input type="text" name="endereco" class="form-control" required>
                                </div>

                                    <div class="mb-4">  
                                        <label class="form-label">Foto (Opcional):</label>
                                        <input type="file" name="foto" accept="image/*">
                                    </div>
                                    
                                    <!-- Formação Acadêmica -->
                                    <h4 class="border-bottom pb-2 mb-3">Formação Acadêmica:</h4>
                                    <div id="formacoes">
                                        <div class="row g-3 formacao mb-2">
                                            <div class="col-md-4">
                                                <input type="text" name="curso[]" class="form-control" placeholder="Curso" required>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-4">
                                            <input type="text" name="instituicao[]" class="form-control" placeholder="Instituição" required>
                                        </div>

                                        <div class="col-md-4">
                                            <input type="text" name="ano[]" class="form-control" placeholder="Ano de Conclusão">
                                        </div>
                                    </div>
                                    <button type="button" id="addFormacao" class="btn btn-outline-success btn-sm mb-4">
                                       + Adicionar Formação
                                    </button>

                                    <!-- Experiência Profissional --> 
                                    <h4 class="border-bottom pb-3 mb-3">Experiência Profissional:</h4>
                                    <div id="experiencias"> 
                                        <div class="mb-3 experiencia">
                                            <input type="text" name="empresa[]" class="form-control" placeholder="Empresa">
                                            <input type="text" name="cargo[]" class="form-control" placeholder="Cargo">
                                            <textarea name="descricao[]" class="form-control" placeholder="Descrição das atividades"></textarea>
                                        </div>
                                    </div>
                                    <button type="button" id="addExperiencia" class="btn btn-outline-success btn-sm mb-4">
                                       + Adicionar Experiência
                                    </button>

                                    <!-- Habilidades -->
                                     <h4 class="border-bottom pb-2 mb-3">Habilidades:</h4>
                                     <div id="habilidades" class="mb-3">
                                        <input type="text" name="habilidade[]" class="form-control mb-2" placeholder="Ex: Comunicação, Trabalho em equipe,Excel PHP, MySQL...">
                                     </div>
                                     <button type="button" id="addHabilidade" class="btn btn-outline-success btn-sm mb-4">
                                       + Adicionar Habilidade
                                        </button>

                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-success btn-lg">Gerar Currículo</button>    
                                    </div>    
                    </form>               
            </div>
          
        </div>
    </body>
</html>