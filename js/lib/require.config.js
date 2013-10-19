var jam = {
    "baseUrl": 'js',
    "packages": [
        {
            "name": "jquery",
            "location": "lib/jquery",
            "main": "dist/jquery.js"
        },
        {
            "name": "backbone",
            "location": "lib/backbone",
            "main": "backbone.js"
        },
        {
            "name": "underscore",
            "location": "lib/underscore",
            "main": "underscore.js"
        },
        {
            "name": "text",
            "location": "lib",
            "main": "text.js"
        }
    ],
    "version": "0.2.15",
    "shim": {
        "backbone": {
            "deps": [
                "underscore",
                "jquery"
            ],
            "exports": "Backbone"
        },
        "underscore": {
            "exports": "_"
        }
    }
};

if (typeof require !== "undefined" && require.config) {
    require.config({
    "baseUrl": 'js',
    "packages": [
        {
            "name": "jquery",
            "location": "lib/jquery",
            "main": "dist/jquery.js"
        },
        {
            "name": "backbone",
            "location": "lib/backbone",
            "main": "backbone.js"
        },
        {
            "name": "underscore",
            "location": "lib/underscore",
            "main": "underscore.js"
        },
        {
            "name": "text",
            "location": "lib",
            "main": "text.js"
        }

    ],
    "shim": {
        "backbone": {
            "deps": [
                "underscore",
                "jquery"
            ],
            "exports": "Backbone"
        },
        "underscore": {
            "exports": "_"
        }
    }
});
}
else {
    var require = {
    "baseUrl": 'js',
    "packages": [
        {
            "name": "jquery",
            "location": "lib/jquery",
            "main": "dist/jquery.js"
        },
        {
            "name": "backbone",
            "location": "lib/backbone",
            "main": "backbone.js"
        },
        {
            "name": "underscore",
            "location": "lib/underscore",
            "main": "underscore.js"
        },
        {
            "name": "text",
            "location": "lib",
            "main": "text.js"
        }
    ],
    "shim": {
        "backbone": {
            "deps": [
                "underscore",
                "jquery"
            ],
            "exports": "Backbone"
        },
        "underscore": {
            "exports": "_"
        }
    }
};
}

if (typeof exports !== "undefined" && typeof module !== "undefined") {
    module.exports = jam;
}