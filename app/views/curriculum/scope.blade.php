<div class="row">
    <div class="col-md-12">

        <div class="curriculum-block img-rounded">

            <a name="scope" class="anchor-tag"></a>

            <h4 class="indent underline">Understanding Scope</h4>
            
            <h5>What is scope?</h5>

            <p>
                In JavaScript, scope is the set of variables, objects, and functions you have access to 
                depending on where you are in your script.
            </p>


            <a name="global"></a>
            {{-- Global --}}
            <h5 class="header1">Global</h5>

            <p>Variables declared outside of a function are referred to as global variables and are in the global scope. Global variables can be accessed by any scripts or functions contained on the web page.</p>

            <p>Global variables will remain present until the execution of the script ends. When running JavaScript in a web browser, this means the user has left the page or closed their browser.</p>


            {{-- Include github gist for embed --}}
            <script src="https://gist.github.com/tlaffoon/16ada7ce7fe2dc3c275e.js"></script>


            <a name="local"></a>
            {{-- Local --}}
            <h5 class="header1">Local</h5>

            <p>Variables declared within a function are referred to as Local variables. Local variables can be accessed within the scope they are declared in, or in any nested function scopes.</p>

            <p>Local variables have a lifetime related to that of the scope they are contained in. Once execution leaves the scope the local variable was declared in, the variable will be deleted.</p>


            {{-- Include github gist for embed --}}
            <script src="https://gist.github.com/tlaffoon/3ca855334b96a76f2b25.js"></script>


            <a name="hoisting"></a>
            {{-- Hoisting --}}
            <h5 class="header1">Hoisting</h5>

            {{-- Include github gist for embed --}}
            <script src="https://gist.github.com/tlaffoon/5ddcee671d28d930301a.js"></script>

            <p>At first glance it seems odd that globalVar would be undefined at the beginning of the sayHello method. Hoisting is the culprit. Hoisting means that any variables declared within a function's scope will get declarations that are moved to the beginning of the function. So, JavaScript actually interprets the code above like this:</p>

            <script src="https://gist.github.com/tlaffoon/777260ef5e6e79591128.js"></script>
            
        </div>

    </div>    
</div>