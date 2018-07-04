// Table Area
$(document).ready(function () {
    $('#datatable').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        }

    });

    var table = $('#datatable').DataTable();

    // Edit record
    table.on('click', '.edit', function () {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
    });

    // Delete a record
    table.on('click', '.remove', function (e) {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }
        table.row($tr).remove().draw();
        e.preventDefault();
    });

    // Like record
    table.on('click', '.like', function () {
        alert('You clicked on Like button');
    });
});

// Buttons Events
$(document).ready(function () {
    $('.actions .btn.edit').on('click', function (e) {
        e.preventDefault();
        url = $(this).attr('href');
        window.location = url;
    });

    $('.actions .btn.remove').on('click', function (e) {
        e.preventDefault();
        url = $(this).attr('href');

        swal({
            title: 'Tem certeza?',
            text: "Ação irreversível",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'Sim, continuar',
            buttonsStyling: false
        }).then(function () {
            $.ajax({
                type: "get",
                url: url,
                dataType: 'json',
                success: function (data) {
                    status = (typeof data['status'] !== 'undefined') ? data['status'] : {
                        status: 'error'
                    };
                    message = (typeof data['message'] !== 'undefined') ? data['message'] : {
                        message: 'Erro ao executar ação. Contactar suporte'
                    };
                    switch (status) {
                        case 'ok':
                            swal({
                                title: "Feito!",
                                text: "Ação executada com sucesso",
                                buttonsStyling: false,
                                confirmButtonClass: "btn btn-success",
                                type: "success"
                            }).then(function (isConfirm) {
                                if (isConfirm) {
                                    setTimeout(() => {
                                        window.location.reload(true); 
                                    }, 200);
                                }
                            });
                            break;
                        case 'warning':
                            swal("Oops...", message, "warning");
                            break;
                        case 'error':
                            swal("Oops...", message, "error");
                            break;
                        default:
                            swal("Oops...", 'Sem resposta do servidor. Entre em contato com o suporte', "warning");
                            break;
                    }
                },
                error: function (jqXHR, text, error) {
                    console.log('[' + error + ']: ' + 'Entre em contato com o suporte');
                }
            }).done(function (data) {
                //...
            });
        });
    });
});