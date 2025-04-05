  /*
  function loadExternalScript(src) {    
        var script = document.createElement('script');
        script.src = src;
        document.body.appendChild(script);
    }
    */
function loadExternalScript(src, id) {    
    if (document.getElementById(id)) {
        console.warn("El script ya ha sido agregado.");
        return;
    }
    
    var script = document.createElement('script');
    script.src = src;
    script.async = true;
    script.defer = true;
    script.id = id;
    document.body.appendChild(script);
}
    // Function to load an inline script
    function loadInlineScript(scriptContent) {    
        var script = document.createElement('script');
        script.text = scriptContent;
        document.body.appendChild(script);
    }
    // Generate a random number between 0 and 1
    var random = Math.random();
    // Load the script based on the random number
    if (random < 0.5) {
        // Add intaker script.
        loadInlineScript(`
            (function (w,d,s,v,odl)
            {
                (w[v]=w[v]||{})['odl']=odl;            
                var f=d.getElementsByTagName(s)[0],j=d.createElement(s);            
                j.async=true;            
                j.src='https://intaker.azureedge.net/widget/chat.min.js';
                f.parentNode.insertBefore(j,f);
            }
            )(window, document, 'script','Intaker', 'zindalawgroup');
        `);
    } else {
        // if the script is a url, use loadExternalScript. url example is on. Remove/add '//' to comment out which one is off/on:
        loadExternalScript("https://platform.clientchatlive.com/chat/init/taIuiN/prompt.js", "bb2c488a8a75_prompt");
        
        //otherwise loadInlineScript
        //loadInlineScript('Another_Provider_script');
  }