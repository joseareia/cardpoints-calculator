$(document).ready(function () {
    $('#submitBtn').unbind().bind('click', function (e) {
        let formData = $('#form').serialize();
        let forms = document.querySelectorAll('.needs-validation');

        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                if (!form.checkValidity()) {
                    event.stopPropagation();
                } else {
                    $('#submitBtn').addClass('disabled');
                    $('#submitBtn').text(' A imprimir...');
                    $('#submitBtn').prepend("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>");
                    $.ajax({
                        method: 'POST',
                        url: 'pdf-generator.php',
                        cache: false,
                        data: formData,
                        success: function (data) {
                            let response = JSON.parse(data);
                            if (response['code'] === 200) {
                                window.open(response['pdfurl'], "_blank");
                            } else {
                                alert("Erro no envio da informação.\nCode: " + response['code'] + "\nInfo: " + response['message']);
                            }
                            clean();
                        }
                    });
                }
                form.classList.add('was-validated');
            }, false);
        });
    });

    $('#resetBtn').click(function () {
        let forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.classList.remove('was-validated');
        });
    });

    function clean() {
        $('#submitBtn').removeClass('disabled');
        $('#submitBtn').text('Imprimir etiqueta');
        $('.spinner-border').remove();
        form.classList.remove('was-validated');
        $('#resetBtn').click();
        $('#valor-descontado').val(0);
        $('#valor-residual').val(0);
    }
});