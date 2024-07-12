<?php
require __DIR__ . '/app.php';
require_login();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meiricarro - Calculadora Cartão Meiricarro</title>
    <style>
    ::placeholder {
        color: #d7d7d7 !important;
        opacity: 1;
    }

    ::-ms-input-placeholder {
        color: #d7d7d7 !important;
    }

    #aviso-acumulado, 
    #aviso-iva, 
    #aviso-valor-residual {
        color: #bfbfbf !important;
        font-style: italic !important;
        margin-left: 2px;
        font-size: 12px !important;
    }

    button {
        font-size: 14.5px !important;
        padding: 0.575rem 0.95rem !important
    }
    </style>
</head>
<body class="bg-light">
    <main style="margin-top:9rem;">
        <div class="container">
            <form class="needs-validation" novalidate method="POST" id="form">
                <div class="row g-5">
                    <div class="col-md-12 col-lg-12">
                        <h4 class="mb-4 fw-bold">Calculadora: Cartão Meiricarro</h4>
                        <div class="row">
                            <div class="col-4">
                                <label for="valor-compra" class="form-label" style="margin-left: 2px;">Valor residual em cartão <span style="color:red;">*<span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="valor-residual" value="0" placeholder="0" pattern="^[\d]{1,10}" required>
                                    <span class="input-group-text">€</span>
                                </div>
                                <div class="form-text" id="aviso-valor-residual">Valor total no cartão do cliente à data.</div>
                            </div>

                            <div class="col-4">
                                <label for="valor-compra" class="form-label" style="margin-left: 2px;">Valor da compra <span style="color:red;">*<span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="valor-compra" placeholder="0" pattern="^[\d]{1,10}" required>
                                    <span class="input-group-text">€</span>
                                </div>
                                <div class="form-text" id="aviso-iva">Valor a ser preenchido com o IVA associado.</div>
                            </div>

                            <div class="col-4">
                                <label for="valor-compra" class="form-label" style="margin-left: 2px;">Valor acumulado no cartão <span style="color:red;">*<span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="valor-acumulado" placeholder="0" pattern="^[\d]{1,10}" required>
                                    <span class="input-group-text">€</span>
                                </div>
                                <div class="form-text" id="aviso-acumulado">Valor calculado sem o campo "<u>Valor a ser descontado</u>".</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-5 mt-4">
                    <div class="col-md-12 col-lg-12">
                        <h4 class="mb-4 fw-bold">Impressão do Talão</h4>
                            <div class="row">
                                <div class="col-4">
                                    <label for="valor-compra" class="form-label" style="margin-left: 2px;">Valor a ser descontado <span style="color:red;">*<span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="valor-descontado" value="0" placeholder="0" pattern="^[\d]{1,10}" required>
                                        <span class="input-group-text">€</span>
                                    </div>
                                    <div class="form-text" id="aviso-acumulado">Valor a ser descontado do cartão do cliente.</div>
                                </div>

                                <div class="col-4">
                                    <label for="valor-compra" class="form-label" style="margin-left: 2px;">Valor acumulado no cartão <span style="color:red;">*<span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="valor-acumulado-talao" name="valor-acumulado" placeholder="0" pattern="^[\d]{1,10}" required>
                                        <span class="input-group-text">€</span>
                                    </div>
                                    <div class="form-text" id="aviso-acumulado">Valor acumulado += Valor residual - Valor descontado.</div>
                                </div>
                                
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <button class="btn btn-link me-md-1" style="color:gray;" id="resetBtn">Limpar formulário</button>
                                <button class="btn btn-dark" type="submit" id="submitBtn">Imprimir etiqueta</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 1992–<?php echo date("Y"); ?> Meiricarro, Lda.</p>
            <ul class="list-inline mt-2">
                <li class="list-inline-item"><a href="https://www.meiricarro.com">Website</a></li>
                <li class="list-inline-item"><a href="https://github.com/joseareia/task-conclusion">Source code</a></li>
                <li class="list-inline-item"><a href="mailto:jose.apareia@gmail.com">Support</a></li>
            </ul>
        </footer>
    </main>
</body>
<script src="js/main.js"></script>
<script src="js/calculation.js"></script>
<script src="js/form-validation.js"></script>
</html>