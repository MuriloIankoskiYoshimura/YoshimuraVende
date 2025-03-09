<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Casas</title>
    <style>
        /* ===== RESET BÁSICO ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8rem;
            color: #007bff;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-group input[type="file"] {
            padding: 5px;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
        }

        .form-footer button {
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
        }

        .form-footer button:hover {
            background: #0056b3;
        }

        /* Estilo para a visualização de imagens */
        .image-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }

        .image-preview img {
            max-width: 100px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Drag & Drop Múltiplo */
        .drop-area {
            border: 2px dashed #ccc;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
        }

        .drop-area.dragover {
            background-color: #f0f0f0;
            border-color: #000;
        }

        .image-container {
            position: relative;
            margin: 5px;
            cursor: pointer;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px;
            display: inline-block;
        }

        .image-container:hover {
            background-color: #f0f0f0;
        }

        .image-container span {
            position: absolute;
            top: 0;
            left: 0;
            background: #000;
            color: #fff;
            padding: 2px 5px;
            font-size: 10px;
            border-radius: 3px;
        }
    </style>

    <script>
        // Função de formatação de preço (opcional)
        function formatPrice(element) {
            // Exemplo simples: remove tudo que não for número e vírgula
            // Ajuste conforme necessidade
        }
    </script>
</head>
<body>
    <div class="form-container">
        <h1>Cadastro de Casas</h1>

        <!-- IMPORTANTE: "action" aponta para o script que processa os dados -->
        <form action="processarcasas.php" method="POST" enctype="multipart/form-data">

            <!-- Título da Casa -->
            <div class="form-group">
                <label for="title">
                    Título da Casa 
                    (<span style="color:red">Obrigatório</span>)
                </label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    placeholder="Ex: Casa no Centro com 3 Quartos" 
                    required
                >
            </div>

            <div class="form-group">
                <label for="seo">
                    Título do Site (SEO) 
                    (<span style="color:red">Obrigatório</span>)
                </label>
                <input 
                    type="text" 
                    id="seo" 
                    name="seo" 
                    placeholder="Ex: Apartamento com 56m²..." 
                    required
                >
            </div>

            <!-- Cidade -->
            <div class="form-group">
                <label for="cidade">
                    Cidade 
                    (<span style="color:red">Obrigatório</span>)
                </label>
                <select id="cidade" name="cidade" required>
                    <option value="">Selecione a Cidade</option>
                    <option value="Garopaba">Garopaba</option>
                    <option value="Paulo Lopes">Paulo Lopes</option>
                    <option value="Outra">Outra</option>
                </select>
            </div>

            <!-- Bairro -->
            <div class="form-group">
                <label for="bairro">
                    Bairro 
                    (<span style="color:red">Obrigatório</span>)
                </label>
                <select id="bairro" name="bairro" required>
                    <option value="">Selecione o Bairro</option>
                    <option value="Centro">Centro</option>
                    <option value="Panorâmico">Panorâmico</option>
                    <option value="Morrinhos">Morrinhos</option>
                    <!-- ... e assim por diante ... -->
                    <option value="Cova Triste">Cova Triste</option>
                </select>
            </div>

            <!-- Endereço -->
            <div class="form-group">
                <label for="rua">
                    Endereço 
                    (<span style="color:red">Obrigatório</span>)
                </label>
                <input 
                    type="text" 
                    id="rua" 
                    name="rua" 
                    placeholder="Ex: Rua Principal, 100" 
                    required
                >
            </div>

            <!-- Tipo de Imóvel -->
            <div class="form-group">
                <label for="type">
                    Tipo de Imóvel 
                    (<span style="color:red">Obrigatório</span>)
                </label>
                <select id="type" name="type" required>
                    <option value="">Selecione</option>
                    <option value="Casa">Casa</option>
                    <option value="Apartamento">Apartamento</option>
                    <option value="Terreno">Terreno</option>
                </select>
            </div>
            
            <!-- Quartos -->
            <div class="form-group">
                <label for="bedrooms">
                    Número de Quartos 
                    (<span style="color:red">Obrigatório</span>)
                </label>
                <input 
                    type="number" 
                    id="bedrooms" 
                    name="bedrooms" 
                    placeholder="Ex: 3" 
                    required
                >
            </div>
            
            <!-- Banheiros -->
            <div class="form-group">
                <label for="bathrooms">
                    Número de Banheiros 
                    (<span style="color:red">Obrigatório</span>)
                </label>
                <input 
                    type="number" 
                    id="bathrooms" 
                    name="bathrooms" 
                    placeholder="Ex: 2" 
                    required
                >
            </div>

            <!-- Área (m2) -->
            <div class="form-group">
                <label for="m2">
                    m2 
                    (<span style="color:red">Obrigatório</span>)
                </label>
                <input 
                    type="number" 
                    id="m2" 
                    name="m2" 
                    placeholder="Ex: 100" 
                    required
                >
            </div>
            
            <!-- Garagem (opcional) -->
            <div class="form-group">
                <label for="garage">Vagas de Garagem</label>
                <input 
                    type="number" 
                    id="garage" 
                    name="garage" 
                    placeholder="Ex: 1"
                >
            </div>
            
            <!-- Preço -->
            <div class="form-group">
                <label for="price">
                    Preço 
                    (<span style="color:red">Obrigatório</span>)
                </label>
                <input 
                    type="text" 
                    id="price" 
                    name="price" 
                    placeholder="Ex: 500.000,00" 
                    required 
                    oninput="formatPrice(this)"
                >
            </div>

            <!-- Descrição (opcional) -->
            <div class="form-group">
                <label for="description">Descrição</label>
                  (<span style="color:red">Obrigatório</span>)
                <textarea 
                    id="description" 
                    name="description" 
                    rows="5" 
                    placeholder="Descreva detalhes do imóvel..."
                ></textarea>
            </div>

            <!-- Imagem de Capa (opcional) -->
            <div class="form-group">
                <label for="coverImage">Imagem de Capa</label>
                  (<span style="color:red">Obrigatório</span>)
                <input 
                    type="file" 
                    id="coverImage" 
                    name="coverImage" 
                    accept="image/*"
                >
                <div class="image-preview" id="coverImagePreview"></div>
            </div>

            <!-- Script de pré-visualização da Capa -->
            <script>
                document.getElementById("coverImage").addEventListener("change", function() {
                    const preview = document.getElementById("coverImagePreview");
                    preview.innerHTML = ""; // Limpa anterior
                    const file = this.files[0];
                    if (file && file.type.startsWith("image/")) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.createElement("img");
                            img.src = e.target.result;
                            preview.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            </script>

            <!-- Imagens do Imóvel (Drag & Drop, obrigatório) -->
            <div class="form-group">
                <label for="images">
                    Imagens do Imóvel 
                    (<span style="color:red">Obrigatório</span>)
                </label>
                <div id="dropArea" class="drop-area">
                    <p>Arraste suas imagens aqui ou clique para selecionar</p>
                    <input 
                        type="file" 
                        id="images" 
                        name="images[]" 
                        accept="image/*" 
                        multiple 
                        required 
                        hidden
                    >
                </div>
                <div class="image-preview" id="imagePreview"></div>
            </div>

            <script>
                const dropArea = document.getElementById("dropArea");
                const fileInput = document.getElementById("images");
                const imagePreview = document.getElementById("imagePreview");
                let filesArray = [];

                dropArea.addEventListener("dragover", (event) => {
                    event.preventDefault();
                    dropArea.classList.add("dragover");
                });

                dropArea.addEventListener("dragleave", () => {
                    dropArea.classList.remove("dragover");
                });

                dropArea.addEventListener("drop", (event) => {
                    event.preventDefault();
                    dropArea.classList.remove("dragover");
                    const files = event.dataTransfer.files;
                    addFiles(files);
                });

                dropArea.addEventListener("click", () => {
                    fileInput.click();
                });

                fileInput.addEventListener("change", () => {
                    addFiles(fileInput.files);
                });

                function addFiles(files) {
                    for (let file of files) {
                        if (file.type.startsWith("image/")) {
                            filesArray.push(file);
                        }
                    }
                    renderPreview();
                }

                function renderPreview() {
                    imagePreview.innerHTML = "";
                    filesArray.forEach((file, index) => {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const container = document.createElement("div");
                            container.classList.add("image-container");
                            container.setAttribute("data-index", index);

                            const imgElement = document.createElement("img");
                            imgElement.src = e.target.result;
                            imgElement.style.width = "100px";
                            imgElement.style.margin = "5px";

                            const label = document.createElement("span");
                            label.textContent = index === 0 ? "Imagem Principal" : "";

                            container.appendChild(imgElement);
                            container.appendChild(label);
                            imagePreview.appendChild(container);

                            // Clique para mover imagem para topo
                            container.addEventListener("click", () => {
                                moveToTop(index);
                            });
                        };
                        reader.readAsDataURL(file);
                    });
                }

                function moveToTop(index) {
                    if (index > 0) {
                        const selected = filesArray.splice(index, 1)[0];
                        filesArray.unshift(selected);
                        renderPreview();
                    }
                }
            </script>

            <!-- Contato -->
            <div class="form-group">
                <label for="contact">
                    Contato (E-mail ou Telefone) 
                    (<span style="color:red">Obrigatório</span>)
                </label>
                <input 
                    type="text" 
                    id="contact" 
                    name="contact" 
                    placeholder="Ex: contato@email.com"
                    required
                >
            </div>

            <!-- Botão de Enviar (importante: type="submit") -->
            <div class="form-footer">
                <button type="submit">Cadastrar Imóvel</button>
            </div>
        </form>
    </div>
</body>
</html>
