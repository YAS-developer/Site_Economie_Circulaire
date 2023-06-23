# Rapport SAE 2.02 


Ce projet s'est réalisé dans le cadre d'une SAE commune avec SAE 2.05 et SAE 2.06.

Nous sommes le groupe **Yassine HAMROUNI**, **Adam SIDHOUM** et **Adem GUETTAF** de l'entreprise **YADE**.

### Membres

[//]: # (Liens GITHUB des membres du projet.)

| Prénom | Lien Github |
| ------ | ------ |
| Adam | <https://github.com/AdamSidhoum> |
| Yassine | <https://github.com/YAS-developer> |
| Adem | <https://github.com/Adem-developer> |

---

## Contexte 

Notre entreprise doit se charger de faire l'intermédiaire entre les particuliers et des entreprises (B2C) pour la vente de matériel électronique (carte graphique, carte mère, processeurs, ...) et la reprise de matériel usagé. L'entreprise n'est pas un simple intermédiaire. Sa valeur ajoutée repose principalement sur sa capacité à recycler le matériel électronique en récupérant des éléments valorisables, que ce soit des métaux précieux ou des composants qui pourront être reconditionnés (batterie, écran tactile, disque ssd, RAM etc).

---


## Travail technique


### Réalisations

####  Ce qui a marché

* Tout d'abord la cagnotte fonctionnelle a été un point fort de notre réalisation, le fait de pouvoir consommer l'argent qui en est contenu et le fait de générer de l'argent, grâce aux ventes de composants informatiques mais également par carte bancaire.

* Dans la page d'accueil du client on voit le nom et le prénom du login, la valeur de la cagnotte et les métaux récupérés grâce aux ventes. 

* La détection automatique des mots clés lors des recherches dans la page de vente.

* La facilité de la recherche dans la page d'achat grâce aux boutons désignant chaque composants possible à l'achat.


#### Ce qui n'a pas marché

* Dans ce cadre, nous avons essayé d'implementer un historique de vente du client, sans un bon emplacement ni une concrète utilité, l'idée a donc dû être abandonné.

* Lors des transactions d'argent avec la cagnotte, nous voulions mettre en place l'actualisation instantannée de la cagnotte. Sans réussite, nous avons opté pour le fait d'indiquer à l'utilisateur de se rediriger vers la page d'accueil afin d'actualiser sa cagnotte.

---

## Conclusions 

#### Individuelles

* Yassine
    + « J'ai trouvé cette saé intéressante car cela m'a permis d'avoir ma première expérience dans le monde du back-end, j'ai trouvé cela redondant car c'était toujours le même principe, c'est-à-dire intéragir avec la base de données, faire des requetes, afficher le résultat etc.
    Cependant, je sais que le monde du back-end n'est pas limité qu'à cela et qu'il existe d'autres opportunités de développement.
    En conclusion, j'ai aimé travailler en équipe durant ce projet car dans le monde du développement web il est primordial d'avoir une bonne synergie, différentes idées pour conclure un but commun qui mène vers de grande choses. »

* Adem
    + « Pour ma part, ce projet a été une bonne expérience pour mon avenir autant collectivement que personnellement en combinant l'entraide et l'autonomie. Je pense que c'est une saé fructifiante avec l'utilisation d'un nouveau langage ---> le php, la gestion des utilisateurs, les interfaces. 
    En conclusion, je me suis senti bien entouré tout au long de ce travail collaboratif et j'ai pu m'améliorer grâce aux recherches effectuées. »

* Adam
    + « D’après moi, c’est un des meilleurs projets que j’ai eu à faire. J’ai toujours voulu devenir développeur web et ce projet m’a permis de réaliser que c’est ce que j’aimais vraiment faire. D’autant plus que les connaissances que ce projet m’a apportées sont d’une très grande utilité. Pour conclure, j’ai apprécié ce travail avec mes camarades. L’ambiance de travail était très correcte. »

#### Collectives

* L'entraide, le partage d'idées et la bonne animosité du groupe a permis de rendre un travail satisfaisant pour l'ensemble de notre équipe dans les délais.
Nous avons tous su tirer profit de cette expérience et nous espérons réaliser des sites web encore meilleurs à l'avenir.


---
### Autres Fonctionalités 

* Nous avons mis en place la possibilité d'**ajouter de l'argent** à sa cagnotte via la page carte bancaire.
* Visiter le site sans avoir à être connecté.

---

## Annexe 1



* Cas de tests :

    + Se connecter (golgot77, micha56, yas, JeanMi91...).
    + La vente de composants que le client peut vendre, un client vend un produit ---> l'argent est ajouté à la cagnotte et également les métaux récupérés par ce produit vendu. 
    + Sur la page d'achat, le client a le choix avec 3 produits : carte graphique, processeur et carte mère. Si il décide d'acheter un produit alors que la cagnotte est inférieure au montant du produit, l'achat est refusé et le client reçoit une notification pop-up qui lui avertit de recharger la cagnotte. En effet, si un client n'a pas d'argent dans sa cagnotte et qu'il ne souhaite pas vendre de produit il pourrait tout simplement recharger sa cagnotte différement grâce à la fonctionnalité ajoutée (carte bancaire).
    + Si le client clique sur le bouton cagnotte, il aura accès à la page de rechargement via carte bancaire.
    Une fois le montant voulu ajouté, le client peut revenir sur la page d'achat pour finaliser les transactions qu'il souhaiterait. 
    

---

## Annexe 2

#### Diagramme SVG / Photos 


* Page à l'arrivé sur le site avec choix de connexion, accès à l'achat et la vente (version pour déconnexion existante également) :

<img src="https://cdn.discordapp.com/attachments/957021599670894673/990710884240330752/unknown.png" alt="Page accueil / choix" width="500"/>


* Page d'accueil contenant les métaux récupérés :

<img src="https://cdn.discordapp.com/attachments/957021599670894673/990710641914425394/unknown.png" alt="Page accueil / métaux" width="500"/>

* Page d'achat avec le choix "**Carte graphique**" :

<img src="https://cdn.discordapp.com/attachments/957021599670894673/990710160718704650/unknown.png" alt="Recherche, page achat" width="500"/>

* La recherche d'article pour la vente avec la barre de recherche :

<img src="https://cdn.discordapp.com/attachments/957021599670894673/990710362708008990/unknown.png" alt="Recherche, page vente" width="500"/>


* Rechargement de cagnotte avec carte bancaire :

<img src="https://cdn.discordapp.com/attachments/957021599670894673/990709444260286544/unknown.png" alt="Recharge de cagnotte" width="300"/>


#### Wireflow

* Voici notre wireflow initial, les changements ont été déjà transmis dans le rapport (Ajout de fonctionnalité et annulation de l'historique d'achat) :

<img src="https://cdn.discordapp.com/attachments/957021599670894673/990713207536644096/YADE_wireflow.png" alt="Wireflow" width="700"/>




## License

YADE

BUT-1 INFO - UPEC - IUT Sénart 2022. All rights reserved. ©