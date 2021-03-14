var chif = window.prompt("entrez un chiffre");

        function TableMultiplication(x) {
            for (i = 1; i < 12; i++) {
                document.write(i + " * " + x + " = " + i * x + "<br/>");
            }
        }
        TableMultiplication(chif);