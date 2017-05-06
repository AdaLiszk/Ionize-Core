<!--
 ~ The MIT License (MIT) Copyright (C) 2009-2017 Ionize Team
 ~
 ~ Permission is hereby granted, free of charge, to any person  obtaining a copy
 ~ of this software and associated documentation files (the "Software"), to deal
 ~ in the Software without  restriction, including without limitation the rights
 ~ to use,  copy,  modify,  merge, publish,  distribute, sublicense, and/or sell
 ~ copies  of  the  Software, and  to  permit  persons  to whom  the Software is
 ~ furnished to do so, subject to the following conditions:
 ~
 ~ The above copyright  notice and this  permission notice  shall be included
 ~ in all copies or substantial portions of the Software.
 ~
 ~ In the case ionize is  used by a company  for its own  clients,  it is not
 ~ permitted  to suggest that  ionize is  the property  of the  company or to
 ~ suggest that  Ionize  has been  created and  developed  by any other  team
 ~ than the official Ionize team, (members listed on the website).
 ~
 ~ THE SOFTWARE IS PROVIDED "AS IS",  WITHOUT WARRANTY  OF ANY KIND,  EXPRESS OR
 ~ IMPLIED,  INCLUDING  BUT NOT  LIMITED  TO THE WARRANTIES  OF MERCHANTABILITY,
 ~ FITNESS FOR A  PARTICULAR  PURPOSE AND NONINFINGEMENT.  IN NO EVENT SHALL THE
 ~ AUTHORS OR  COPYRIGHT HOLDERS  BE LIABLE  FOR ANY  CLAIM,  DAMAGES  OR  OTHER
 ~ LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 ~ OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 ~ SOFTWARE.
 -->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8" />
    <title> Greetings in IonizeCMS ! </title>

    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <style>
        body, td, th { font-family: Slabo, Arial, sans-serif; }
        html, body {
            height: 100%;
            margin: 0; padding: 0;
        }
        html {
            background-color: #379996;
            background: linear-gradient(45deg, #155799 0%,#379996 54%, #9ee0e8 100%);
        }
        body {
            background: transparent url('assets/bgpattern.png') repeat top left;
        }
        h1, h2, h3, h4, h5, h6 {
            margin: 0; padding: 0;
        }
        p {
            margin: 10px 0 0 0; padding: 0;
        }
        body {
            display: flex; flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        main {
            display: flex; flex-direction: column;
            background: #FAFAFA; padding: 20px;
            border-top: 1px solid #FFF;

            text-align: center;
            justify-content: center;
            align-items: center;

            max-width: 500px; margin: 0 auto;
            line-height: 150%; font-size: 90%;

            border-radius: 0 0 2px 2px;
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.07), 0 2px 10px 0 rgba(0, 0, 0, 0.06), 0 6px 2px -4px rgba(0, 0, 0, 0.1);
        }
        div.error {
            width: 100%; margin: 20px 0; padding: 10px 20px; font-size: 90%; color: #A00;
            background: #ffd92a; letter-spacing: 1px;
            border-top: 1px solid #FFF; border-bottom: 1px solid #FFF;

            display: flex; flex-direction: row;
            justify-content: center;
            align-items: stretch;

        }
        div.error span:first-of-type {
            width: 80px; text-align: center;
            font-size: 40px; line-height: 38px;
        }
        div.error span:last-of-type {
            text-align: left;
        }
    </style>
</head>
<body>
    <main>
        <h1>Greetings from <img src="assets/logo.png" alt="IonizeCMS" align="absMiddle" style="margin-bottom: 20px" /></h1>
        <p style="text-align: justify">
            Ionize is an Open Source PHP Content Management system created for webdesigners
            and developers. Ionize is a free professional and natively multilingual CMS,
            developed  with user  experience in mind.  Ionize is dedicated  to webdesigners
            and  webagencies to simply  make  their clients happy,  but also for developers
            who does not have his hands tied as in other systems.
        </p>
        <p>
            For more information visit the:
            <a href="http://ionizecms.com">http://ionizecms.com</a>
        </p>
        <p>
            {{ $version }}
        </p>
    </main>
</body>
</html>