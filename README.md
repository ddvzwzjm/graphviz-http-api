# Run 

```
docker run -d -p 8080:80 alexerm/graphviz-rest
```

# Use

Open your browser at `http://[dockerip]:8080/`

## GET /
shows sandbox form. Paste your dot file there and get the image name or error report in response
## POST /
script - Put dot file contents into script parameter of POST request

Successful Response 
```
{"imageId": "image.png", "parserOutput": ["Warning: ..."]}
```

Failed Response 
```
{"error": "Invalid script", "parseError": ["Error: ..."]} 
```
## GET /{imageId}

Returns generated graph image

# Develop
1. Run `docker run -it --rm -v $(pwd):/root alexerm/graphviz-rest` 
2. Edit `index.php`

# Build 
```
docker build -t graphviz-rest .
```
