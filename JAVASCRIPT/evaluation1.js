        let age = 0;
        let tab1 = new Array();
        let tab2 = new Array();
        let tab3 = new Array();
        let tab4 = new Array();
        while (age < 100) {
            age = window.prompt("Entrez l'age : ");
            if (age < 20 && age > 0 && age != null) {
                tab1.push(age);
                console.log(tab1);
            } else if (age > 40 && age != null) {
                tab2.push(age);
                console.log(tab2);
            } else if (age >= 20 || age <= 40 && age != null) {
                tab3.push(age);
                console.log(tab3);

            }
        }
        document.write("les personnes d'âge strictement inférieur à 20 est : " + tab1.length + "<br/>");
        document.write("les personnes d'âge strictement supérieur à 40 est : " + tab2.length + "<br/>");
        document.write("les personnes d'âge est compris entre 20 ans et 40 ans : " + tab3.length);