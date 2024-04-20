const fs = require('fs');
const path = require('path');
const bodyParser = require('body-parser');
const express = require('express');
const { ImageAnnotatorClient } = require("@google-cloud/vision");

const app = express();
const port = 3000;

app.use(bodyParser.json({ limit: '50mb' }));
app.use(bodyParser.urlencoded({ extended: true, limit: '50mb' }));

app.use((req, res, next) => {
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
    res.setHeader('Access-Control-Allow-Headers', 'Content-Type');
    next();
});

const client = new ImageAnnotatorClient({
    keyFilename: "./travco-412917-694a50abd5f5.json",
});

app.post('/', (req, res) => {
    const imageData = req.body.image;
    const pageId = req.body.pageId;

    if (!imageData) {
        return res.status(400).send('Image data is missing.');
    }

    const base64Data = imageData.replace(/^data:image\/jpeg;base64,/, '');
    const imagePath = path.join(__dirname, 'temp', 'temp_image.jpg');

    fs.writeFile(imagePath, base64Data, 'base64', (err) => {
        if (err) {
            console.error('Error saving image:', err);
            return res.status(500).send('Error saving image.');
        }
        console.log('Image saved successfully:', imagePath);

        client
            .textDetection(imagePath)
            .then(([result]) => {
                const textAnnotations = result.textAnnotations;
                if (textAnnotations && textAnnotations.length > 0) {
                    let textContent = textAnnotations[0].description;
                    textContent = textContent.replace(/\?\s+/g, "? ");
                    console.log(textContent);

                    const jsonResponse = {
                        pageId: pageId,
                        textContent: textContent
                    };
                    res.json(jsonResponse);
                } else {
                    console.log("No text found in the image.");
                    res.json({ pageId: pageId, textContent: "No text found in the image." });
                }
            })
            .catch((err) => {
                console.error("Error:", err);
                res.status(500).send("Error processing image text");
            })
            .finally(() => {
                fs.unlinkSync(imagePath);
            });
    });
});

app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});
