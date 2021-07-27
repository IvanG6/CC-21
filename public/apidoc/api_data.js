define({ "api": [
  {
    "type": "post",
    "url": "/api/v1/client/login",
    "title": "Login for client",
    "group": "v1/client",
    "name": "Login_for_client",
    "description": "<p>Login for client</p>",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>client email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "code",
            "description": "<p>code from mail</p>"
          }
        ]
      }
    },
    "filename": "routes/api.php",
    "groupTitle": "v1/client"
  },
  {
    "type": "post",
    "url": "/api/v1/coach/login",
    "title": "Login for coach",
    "group": "v1/coach",
    "name": "Login_for_coach",
    "description": "<p>Login for coach</p>",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>coach email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>coach password</p>"
          }
        ]
      }
    },
    "filename": "routes/api.php",
    "groupTitle": "v1/coach"
  },
  {
    "type": "post",
    "url": "/api/v1/coach/register_step_1",
    "title": "",
    "group": "v1/coach",
    "name": "Registration_for_coach",
    "description": "<p>First step of registration that only validates bypassed fileds</p>",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>coach email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>coach password</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password_confirm",
            "description": "<p>password confirmation</p>"
          }
        ]
      }
    },
    "filename": "routes/api.php",
    "groupTitle": "v1/coach"
  },
  {
    "type": "post",
    "url": "/api/v1/coach/register_step_2",
    "title": "",
    "group": "v1/coach",
    "name": "Registration_for_coach",
    "description": "<p>Second step of registration, validates all addition fieilds and returns coach object with access token</p>",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>coach email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>coach password</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password_confirmation",
            "description": "<p>coach password again</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "first_name",
            "description": "<p>coach first name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "last_name",
            "description": "<p>coach last name</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "currency_id",
            "description": "<p>number with id from static currency list</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "timezone_id",
            "description": "<p>number with id from static timezone list</p>"
          }
        ]
      }
    },
    "filename": "routes/api.php",
    "groupTitle": "v1/coach"
  }
] });
