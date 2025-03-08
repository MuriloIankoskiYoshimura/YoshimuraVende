<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Casas</title>
    <style>
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
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Cadastro de Casas</h1>
        <form action="processarcasas.php" method="POST" enctype="multipart/form-data">
            <!-- Título da Casa -->
            <div class="form-group">
                <label for="title">Título da Casa (para voc~e encontrar e para mensagem whatsapp)</label>
                <input type="text" id="title" name="title" placeholder="Ex: Casa no Centro com 3 Quartos" required>
            </div>

            <div class="form-group">
                <label for="title">Título do site(SEO)</label>
                <input type="text" id="seo" name="seo" placeholder="Ex: Apartamento com 56m² no bairro Centro em Garopaba para Comprar" required>
            </div>

            <select id="cidade" name="cidade" required>
        <option value="">Selecione a Cidade</option>
        <option value="Garopaba">Garopaba</option>
        <option value="Garopaba">Paulo Lopes</option>
        <option value="Outra">Outra</option>
    </select>


            <!-- Localização -->
            <div class="form-group">
    <label for="bairro">Bairro</label>
    <select id="bairro" name="bairro" required>
        <option value="">Selecione o Bairro</option>
        <option value="Centro">Centro</option>
        <option value="Panorâmico">Panorâmico</option>
        <option value="Morrinhos">Morrinhos</option>
        <option value="Ferraz">Ferraz</option>
        <option value="Ambrósio">Ambrósio</option>
        <option value="Pinguirito">Pinguirito</option>
        <option value="Areias de Palhocinha">Areias de Palhocinha</option>
        <option value="Campo D’una">Campo D’una</option>
        <option value="Encantada">Encantada</option>
        <option value="Barrinha">Barrinha</option>
        <option value="Vigia">Praia da Vigia</option>
        <option value="Gamboa">Gamboa</option>
        <option value="Praia da Ferrugem">Praia da Ferrugem</option>
        <option value="Praia do Silveira">Praia do Silveira</option>
        <option value="Praia do Rosa">Praia do Rosa</option>
        <option value="Ouvidor">Praia do Ouvidor</option>
        <option value="Praia da Barra">Praia da Barra</option>
        <option value="Macacu">Macacu</option>
        <option value="Limpa">Limpa</option>
        <option value="Garopaba Sul">Garopaba Sul</option>
        <option value="Siriú">Siriú</option>
        <option value="Cova Triste">Cova Triste</option>
    </select>



            <div class="form-group">
                <label for="rua">Endereço</label>
                <input type="text" id="rua" name="rua" placeholder=" nome da rua e numero! " required>
            </div>

            
            <!-- Tipo de Imóvel -->
            <div class="form-group">
                <label for="type">Tipo de Imóvel</label>
                <select id="type" name="type" required>
                    <option value="">Selecione</option>
                    <option value="Casa">Casa</option>
                    <option value="Apartamento">Apartamento</option>
                    <option value="Terreno">Terreno</option>
                </select>
            </div>
            
            <!-- Número de Quartos -->
            <div class="form-group">
                <label for="bedrooms">Número de Quartos</label>
                <input type="number" id="bedrooms" name="bedrooms" placeholder="Ex: 3" required>
            </div>
            
            <!-- Número de Banheiros -->
            <div class="form-group">
                <label for="bathrooms">Número de Banheiros</label>
                <input type="number" id="bathrooms" name="bathrooms" placeholder="Ex: 2" required>
            </div>

            <div class="form-group">
                <label for="m2">m2</label>
                <input type="number" id="m2" name="m2" placeholder="Ex: 100" required>
            </div>
            
            <!-- Vagas de Garagem -->
            <div class="form-group">
                <label for="garage">Vagas de Garagem</label>
                <input type="number" id="garage" name="garage" placeholder="Ex: 1">
            </div>
            
            <!-- Preço -->
            <div class="form-group">
    <label for="price">Preço</label>
    <input type="text" id="price" name="price" placeholder="Ex: 500.000,00" required oninput="formatPrice(this)">
</div>


            
            <!-- Descrição -->
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea id="description" name="description" rows="5" placeholder="Descreva detalhes do imóvel..." ></textarea>
            </div>
            <div class="form-group">
    <label for="coverImage">Imagem de Capa</label>
    <input type="file" id="coverImage" name="coverImage" accept="image/*" >
    <div class="image-preview" id="coverImagePreview"></div>
</div>

<script>
    // Pré-visualização da Imagem de Capa
    document.getElementById("coverImage").addEventListener("change", function(event) {
        const coverImagePreview = document.getElementById("coverImagePreview");
        coverImagePreview.innerHTML = ""; // Limpa a pré-visualização anterior

        const file = event.target.files[0];

        if (file && file.type.startsWith("image/")) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const imgElement = document.createElement("img");
                imgElement.src = e.target.result;
                coverImagePreview.appendChild(imgElement);
            };

            reader.readAsDataURL(file);
        }
    });
</script>
            
             <!-- Upload de Imagens -->
<div class="form-group">
    <label for="images">Imagens do Imóvel</label>
    <div id="dropArea" class="drop-area">
        <p>Arraste suas imagens aqui ou clique para selecionar</p>
        <input type="file" id="images" name="images[]" accept="image/*" multiple required hidden>
    </div>
    <div class="image-preview" id="imagePreview"></div>
</div>

<script>
    const dropArea = document.getElementById("dropArea");
    const fileInput = document.getElementById("images");
    const imagePreview = document.getElementById("imagePreview");
    let filesArray = [];

    // Eventos para drag and drop na área de upload
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

    // Abrir seletor de arquivos ao clicar na área
    dropArea.addEventListener("click", () => {
        fileInput.click();
    });

    // Evento ao selecionar arquivos via input
    fileInput.addEventListener("change", () => {
        const files = fileInput.files;
        addFiles(files);
    });

    // Adicionar arquivos ao array e renderizar
    function addFiles(files) {
        Array.from(files).forEach(file => {
            if (file && file.type.startsWith("image/")) {
                filesArray.push(file);
            }
        });
        renderPreview();
    }

    // Renderizar pré-visualização das imagens
    function renderPreview() {
        imagePreview.innerHTML = ""; // Limpar pré-visualização
        filesArray.forEach((file, index) => {
            const reader = new FileReader();

            reader.onload = function(e) {
                const imgContainer = document.createElement("div");
                imgContainer.classList.add("image-container");
                imgContainer.setAttribute("data-index", index);

                const imgElement = document.createElement("img");
                imgElement.src = e.target.result;
                imgElement.style.width = "100px";
                imgElement.style.margin = "5px";

                const label = document.createElement("span");
                label.textContent = index === 0 ? "Imagem Principal" : "";

                imgContainer.appendChild(imgElement);
                imgContainer.appendChild(label);
                imagePreview.appendChild(imgContainer);

                // Evento de clique para mover a imagem para o topo
                imgContainer.addEventListener("click", () => {
                    moveToTop(index);
                });
            };

            reader.readAsDataURL(file);
        });
    }

    // Mover imagem para o topo da lista
    function moveToTop(index) {
        if (index > 0) {
            const selectedFile = filesArray.splice(index, 1)[0];
            filesArray.unshift(selectedFile); // Adiciona no início
            renderPreview(); // Atualiza a visualização
        }
    }
</script>

<!-- Estilo adicional -->
<style>
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

    .image-preview {
        display: flex;
        flex-wrap: wrap;
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
            
            <!-- Contato -->
            <div class="form-group">
                <label for="contact">Contato (E-mail ou Telefone)</label>
                <input type="text" id="contact" name="contact" placeholder="Ex: contato@email.com ou (99) 99999-9999" required>
            </div>
            
            <!-- Botão de Enviar -->
            <div class="form-footer">
                <button type="submit">Cadastrar Imóvel</button>
            </div>
        </form>
    </div>
</body>
</html>
