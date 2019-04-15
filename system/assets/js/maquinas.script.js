var table = "";

$(document).on('click','.btn-alterar',function(){
    $("#edit-tab").click();
    var data = table.row($(this).parents('tr')).data();

    $("#ed-idmaquina").val(data['idmaquina']);
    $("#ed-nome").val(data['nome']);
})
$(document).on('click','.btn-deletar',function(){
    
    var data = table.row($(this).parents('tr')).data();
    Swal.fire({
      title: 'Você tem certeza que deseja deletar a máquina com o id "'+data['idmaquina']+'" e nome "'+data['nome']+'"?',
      text: "Você não vai poder reverter isso!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sim, deletar!'
    }).then((result) => {
      if (result.value) {

        $.ajax({
            url: "Maquinas/Deletar",
            type: "POST",
            data: {'idmaquina':data['idmaquina']},
            beforeSend : function() {
                Swal.showLoading();
            },
            complete : function() {
                Swal.hideLoading()
            },
            success: function (data) {
                    var json = $.parseJSON(data);
                    if (json.result == 'success') {  
                        table.ajax.reload();
                        Swal.fire(
                           'Deletado!',
                           'A máquina foi deletada com sucesso.',
                           'success'
                        );

                    } else{          
                        table.ajax.reload();
                        $.notify("Erro ao adicionar máquina!", "error");
                    }             
            }
       });

      }
    })

})

$(document).ready(function(){
	 table = $('#tblMachines').DataTable({
        "oLanguage": {
            "sEmptyTable": "Nenhum registro encontrado.",
            "sInfo": "_TOTAL_ registros",
            "sInfoEmpty": "0 Registros",
            "sInfoFiltered": "(De _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Mostrar _MENU_ registros por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado.",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            }
        },
        "ajax": {
            "url": 'Maquinas/Listar/',
        },
        "columnDefs": [           
            {
                "targets": 3,
                "visible": true,
                "searchable": false
            },
             {
                "targets": 2, /*anterior 9 */
                "data": null,                
                "defaultContent": "<a href='#ModalAtualizarDados' data-toggle='modal' id='' role='button' class='btn btn-success  btn-alterar'><i class='ti ti-reload' title='Atualizar Dados'></i></a>"
            },           
            {
                "targets": 3, /*anterior 9 */
                "data": null,                
                "defaultContent": "<a href='#ModalDeletar' data-toggle='modal' id='' role='button' class='btn btn-danger  btn-deletar'><i class='ti ti-trash' title='Deletar Dados'></i></a>"
            }
        ],
        "columns": [{"data":"idmaquina"},{"data": "nome"}]
                 /*"fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    
                 }*/
    });
	$("#btn-save-add").click(function(){
		var form = $("#form-save-add").serialize();
		
	   $.ajax({
			url: "Maquinas/Adicionar",
			type: "POST",
			data: form,
			beforeSend : function() {
				
			},
			complete : function() {
				
			},
			success: function (data) {
					var json = $.parseJSON(data);
					if (json.result == 'success') {
                        $("#form-save-add input").val('');
                        $("#list-tab").click();  
                        table.ajax.reload();
						$.notify("Máquina adicionada com sucesso!", "success");

					} else{          
                        table.ajax.reload();
						$.notify("Erro ao adicionar máquina!", "error");
					}             
			}
	   });
	});
    $("#btn-save-ed").click(function(){
        var form = $("#form-save-ed").serialize();
        
        $.ajax({
            url: "Maquinas/Alterar",
            type: "POST",
            data: form,
            beforeSend : function() {
                
            },
            complete : function() {
                
            },
            success: function (data) {
                    var json = $.parseJSON(data);
                    if (json.result == 'success') {  
                        $("#form-save-ed input").val('');
                        $("#list-tab").click();
                        table.ajax.reload();
                        $.notify("Máquina alterada com sucesso!", "success");

                    } else{          
                        table.ajax.reload();
                        $.notify("Erro ao alterar dados da máquina!", "error");
                    }             
            }
        });
    });


});
