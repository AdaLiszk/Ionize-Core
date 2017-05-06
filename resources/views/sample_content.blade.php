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
    <title> {{ $content->title }} </title>

    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:300,400,500|Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <style>
        body, td, th { font-family: 'Source Sans Pro', Arial, sans-serif; font-weight: 300; }
        html, body {
            height: 100%;
            margin: 0; padding: 0;
        }
        html {
            background-color: #155799;
        }
        body:after {
            content: ''; position: fixed; top: 0; right: 0; bottom: 0; left: 0; z-index: -1;
            background: transparent url('assets/bgpattern.png') repeat top left;
        }
        h1, h2, h3, h4, h5, h6 {
            margin: 0; padding: 0; font-weight: 300;
        }
        p {
            margin: 10px 0 0 0; padding: 0;
        }
        header, main {
            background: #FAFAFA; padding: 20px;
            text-align: left;
        }
        header {
            width: 100%; padding: 20px 0;

            display: flex; flex-direction: column;
            border-top: 3px solid #155799;

            justify-content: center;
            align-items: center;

            background-color: #111;
            color: #eee;
        }
        main, header > h1 {
            width: 996px;
        }
        main {
            display: flex; flex-direction: column;
            border-top: 1px solid #FFF;

            justify-content: center;
            align-items: stretch;

            max-width: 80em; margin: 0 auto;
            line-height: 150%; font-size: 90%;

            border-radius: 0 0 2px 2px;
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.07), 0 2px 10px 0 rgba(0, 0, 0, 0.06), 0 6px 2px -4px rgba(0, 0, 0, 0.1);
        }
        pre {
            display: block; margin: 10px; padding: 10px; max-height: 300px; overflow: auto;
            background: #111; color: #eee;
        }
    </style>
</head>
<body>
<header>
    <h1>{{ $content->title }}</h1>
</header>
<main>
    {!! $content !!}
    <pre>@php print_r($content) @endphp</pre>
    <footer>
        {elapsed_time}ms
        {memory_usage}MB
    </footer>
</main>
</body>
</html>