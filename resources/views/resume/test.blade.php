<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
<style>
    body {
        font-family: sans-serif;
    }
</style>
<style>
    .container {
        width: 210mm;
        max-width: 210mm;
        margin: 0 auto;
        background: #fff;
    }

    hr {
        height: 11px;
        background: #414141;
        margin-bottom: 10px;
        border: none;
    }

    .header {
        text-align: center;
        height: 150px;
        position: relative;
    }

    .header>div:first-child {
        position: absolute;
        width: 500px;
        height: 100%;
        top: 0;
        left: 19%;
        background: #414141;
        z-index: 100;
    }

    .border {
        width: 100%;
        height: 47px;
        position: absolute;
        bottom: 43px;
        left: 0;
        z-index: 99;
    }

    .header>div>div {
        position: absolute;
        top: 45px;
        left: 59px;
    }

    .name {
        text-transform: uppercase;
        font-size: 35px;
        font-weight: 400;
        color: #fff;
        letter-spacing: 10px;
    }

    .sp {
        text-transform: uppercase;
        padding: 8px 0;
        font-size: 15px;
        color: #fff;
        font-weight: 300;
        letter-spacing: 10px;
    }

    .contact {
        display: flex;
        justify-content: space-around;
        text-align: center;
        font-size: 13px;
        height: 75px;
        padding: 15px 0;
        margin-top: 20px;
    }

    .info>span {
        text-transform: uppercase;
        font-weight: 600;
    }

    .content {
        padding: 20px 30px 50px 30px;
    }

    .about {
        height: 135px;
    }

    .title {
        text-transform: uppercase;
        border-bottom: 2px solid #a4a4a4;
        padding-bottom: 8px;
        letter-spacing: 3px;
        font-size: 17px;
        text-align: center;
        font-weight: 600;
    }

    .about>p:last-child {
        padding-top: 5px;
        line-height: 20px;
        font-size: 13px;
    }

    .compe {
        margin-top: 30px;
    }

    .compe>div {
        display: grid;
        grid-template-columns: auto auto auto;
        text-align: center;
        padding: 20px 0;
    }

    .compe>div>p {
        text-align: center;
        font-size: 13px;
        margin: 0;
    }

    .exp {
        height: 423px;
    }

    .exp-1,
    .exp-2 {
        padding: 10px 0;
    }

    .exp-1>p:first-child,
    .exp-2>p:first-child {
        font-size: 15px;
    }

    .exp-1>p:nth-child(2),
    .exp-2>p:nth-child(2) {
        font-size: 13px;
    }

    .exp-1>p:nth-child(3),
    .exp-2>p:nth-child(3) {
        padding: 10px 0;
        font-size: 13px;
    }

    .exp-1>ul,
    .exp-2>ul {
        margin-left: 40px;
        font-size: 13px;
    }

    .for>p:nth-child(2) {
        padding: 13px 0 5px 0;
    }

    .for>div {
        display: flex;
    }

    .for>div>p {
        border-right: 2px solid #a4a4a4;
        padding-right: 5px;
        font-style: italic;
    }

    .for>div>p:last-child {
        border-right: none;
        padding-left: 5px;
    }
</style>

<div class="container">
    <div class="header">
        <div>
            <div>
                <p class="name">LOIC ROUSSEL</p>
                <p class="sp">CUISINIER</p>
            </div>
        </div>
        <div class="border">
            <hr>
            <hr>
            <hr>
        </div>
    </div>
    <div class="contact">
        <div class="info">
            <span>TEL</span>
            <p>0606060606</p>
        </div>
        <div class="info">
            <span>ADRESSE</span>
            <p>Rue Code Postal Ville</p>
        </div>
        <div class="info">
            <span>EMAIL</span>
            <p>votreemail@mail.com</p>
        </div>
    </div>
    <div class="content">
        <div class="about">
            <p class="title">Profil</p>
            <p>Utilisez cette zone pour vous vendre rapidement et prouver que vos compétences et vos réalisations
                peuvent vraiment aider l'entreprise que vous postulez. Si vous avez des chiffres précis ou des
                pourcentages pour quantifier vos réalisations, utilisez-les. Cela prouve que vous êtes indispensable
                pour le poste, au lieu de simplement le dire. Évitez de mentionner des généralités, - cette méthode est
                maintenant dépassée et le recruteur veut avoir un aperçu de la façon dont vous pouvez apporter de la
                valeur pour l'entreprise.</p>
        </div>
        <div class="compe">
            <p class="title">COMPETENCES</p>
            <div>
                <p>Compétence</p>
                <p>Compétence</p>
                <p>Compétence</p>
                <p>Compétence</p>
                <p>Compétence</p>
                <p>Compétence</p>
                <p>Compétence</p>
                <p>Compétence</p>
                <p>Compétence</p>
                <p>Compétence</p>
                <p>Compétence</p>
                <p>Compétence</p>
            </div>
        </div>
        <div class="exp">
            <p class="title">EXPÉRIENCES PROFESSIONNELLES</p>
            <div class="exp-1">
                <p>TITRE DU POSTE ICI</p>
                <p>Société, Ville, / 2011 - Présent</p>
                <p>Utilisez ce paragraphe principal pour donner un résumé de votre fonction, ce que vous avez accompli,
                    ou une brève description de l'entreprise si elle n'est pas très connue. Ou, supprimer ce paragraphe
                    et allez droit au but!</p>
                <ul>
                    <li>Décrivez vos réalisations dans ce poste et utilisez des mots d'action comme “géré“ et" dirigé
                        “au lieu « responsable. »</li>
                    <li>Ne listez que vos tâches ou copier votre description de poste ! </li>
                    <li>Qu'avez-vous fait dans cette fonction qui pourrait profiter à la société a laquelle vous
                        postulez en termes de profit, économie d'argent, ou gain de temps ?</li>
                    <li>Dressez la liste des réalisations les plus impressionnantes et pertinentes en premier. Si vous
                        avez des chiffres précis pour quantifier vos réalisations, les utiliser !</li>
                    <li> Les chiffres sont essentiels et interpelle le recruteur. Vous pourriez avoir à faire un peu de
                        mathématiques pour obtenir des chiffres ou des pourcentages.</li>
                    <li>Par exemple : J'ai organisé un salon qui s'est avéré être une réussite avec plus de 2000 entrées
                        et un taux de satisfaction de 95%</li>
                </ul>
            </div>
            <div class="exp-2">
                <p>TITRE DU POSTE ICI</p>
                <p>Société, Ville, / 2009 - 2011</p>
                <ul>
                    <li>Décrivez vos réalisations dans ce poste et utilisez des mots d'action comme “géré“ et" dirigé
                        “au lieu « responsable. »</li>
                    <li>Ne listez que vos tâches ou copier votre description de poste ! </li>
                    <li>Qu'avez-vous fait dans cette fonction qui pourrait profiter à la société a laquelle vous
                        postulez en termes de profit, économie d'argent, ou gain de temps ?</li>
                </ul>
            </div>
        </div>
    </div>
</div>
