<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche d'Adresses</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
            color: #333;
        }

        form {
            margin-bottom: 20px;
            background-color: #fff;
            padding: 10px;
        
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"] {
            padding: 10px;
            margin-right: 10px;
           
            border: 1px solid #ccc;
            width: 200px;
        }

        button {
            padding: 10px 15px;
         
            border: none;
            background-color: pink;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: red;
        }

        #results {
            margin-top: 10px;
            padding-top: 10px;
            background-color: #fff;
          
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <form id="searchForm">
        <h2> Bienvenue ! </h2>

        <p> Saisissez une adresse ou un code postal </p>


        <input type="text" id="searchQuery" placeholder="Entrez votre recherche...">
        
    </form>
    
    <div id="results"></div>

    <script>
        const searchQueryInput = document.getElementById('searchQuery');
        const resultsContainer = document.getElementById('results');

        searchQueryInput.addEventListener('input', function() {
            const query = this.value;
            if (query.length >= 4) {
                fetch(`search.php?query=${encodeURIComponent(query)}`)
                    .then(response => response.text())
                    .then(data => {
                        resultsContainer.innerHTML = data;
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                resultsContainer.innerHTML = '';
            }
        });

      
       
    </script>
</body>
</html>
