 $(document).ready(function() {
    function calcIdade(dateStr){
if(!dateStr) return '';
const dob = new Date(dateStr);
const today = new Date();
let age = today.getFullYear() - dob.getFullYear();
const m = today.getMonth() - dob.getMonth();
if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
age--;
}
return age;
}
$('#nascimento').on('change', function(){
const d = $(this).val();
$('#idade').val(calcIdade(d));
});

 $("#addFormacao").click(function() { //Define um evento de clique para o botão com ID
        $("#formacoes").append(`
            <div class="row g-3 formacao mb-2">
                <div class="col-md-4"> 
                    <input type="text" name="curso[]" class="form-control" placeholder="Curso">
                </div>
                <div class="col-md-4"> 
                    <input type="text" name="instituicao[]" class="form-control" placeholder="Instituição">
                </div>
                <div class="col-md-4"> 
                    <input type="text" name="ano[]" class="form-control" placeholder="Ano de Conclusão">
                </div>
            </div>
        `);
    });

    $("#addExperiencia").click(function() {
        $("#experiencias").append(`
            <div class="mb-3 experiencia">
                <input type=text" name="empresa[]" class="form-control mb-2" placeholder="Empresa">
                <input type=text" name="cargo[]" class="form-control mb-2" placeholder="Cargo">
                <textarea name="descricao[]" class=form-control" placerholder="Descrição das atividades"></textarea>
            </div>
        `);
    });

    $("#addHabilidade").click(function() {
        $("#habilidades").append(`
            <input type="text" name="habilidades[]" class="form-control  mb-2" placeholder="Ex: Liderança, JavaScript, Comunicação, etc...">
        `);
    });
});    