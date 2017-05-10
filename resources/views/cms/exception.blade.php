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
    <title> Woops! - {{ $shortName }} </title>

    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:300,400,500|Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <style>
        body, td, th { font-family: 'Source Sans Pro', Arial, sans-serif; font-weight: 300; }
        html, body {
            height: 100%;
            margin: 0; padding: 0;
        }
        html {
            background: #155799 url('assets/ionize/bgpattern.png') repeat top left;
        }
        body {
            background: transparent url('assets/ionize/bottom_pattern_bright.png') repeat-x bottom left;
        }
        h1, h2, h3, h4, h5, h6 {
            margin: 0; padding: 0; font-weight: 300;
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

            width: 80%;

            text-align: left;
            justify-content: center;
            align-items: stretch;

            max-width: 80em; margin: 0 auto;
            line-height: 150%; font-size: 90%;

            border-radius: 0 0 2px 2px;
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.07), 0 2px 10px 0 rgba(0, 0, 0, 0.06), 0 6px 2px -4px rgba(0, 0, 0, 0.1);
        }
        .error {
            font-size: 90%; color:  #ffd92a;
            background: #aa0e18; letter-spacing: 1px;
            border: 1px solid #000;
        }
        .error h1 {

        }
        .error p {
            font-weight: 400;
        }
        .trace {
            background: #222; padding: 10px; font-size: 70%;
            margin: 10px -20px -20px -20px;

            max-height: 600px; overflow: auto;

            font-family: 'Source Code Pro', monospace;
        }
        .trace .item {
            display: flex; flex-direction: row;
            justify-content: space-between;

            border-bottom: 1px dotted #000;
        }
        @media screen and (max-width: 1440px)
        {
            .trace .item {
                flex-direction: column; margin-bottom: 5px;
            }
        }
        .trace .item .file {
            color: #888;
        }
    </style>
</head>
<body>
    <main class="error">
        <h1>Woops! <b>{{ $shortName }}</b></h1>
        <p>in file <b>{{ $file }}</b> : <b>{{ $line }}</b></p>
        <p>{{ $message  }}</p>
        <div class="trace">
            @foreach ($trace as $item)
                <div class="item">
                    <span class="step">@if(isset($item['class'])) {{ $item['class'] }} {{ $item['type'] }} @endif {{ $item['function'] }}()</span>
                    @if (isset($item['file']))
                        <span class="file">{{ str_replace($basePath,'',$item['file']) }}:{{ $item['line'] }}</span>
                    @endif
                </div>
            @endforeach
        </div>
    </main>
</body>
</html>