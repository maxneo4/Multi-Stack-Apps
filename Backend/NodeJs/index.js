const express = require('express')
const app = express()
const port = 3000
const { v4: uuidv4 } = require('uuid');

app.get('/', (req, res) => {
  res.send('Hello World!')
})

app.get('/api/generate/uuid', (req, res) => {
  const count = req.query.count
  const uuids =[]
  for(let i = 0; i < count; i++) {
    uuids.push(uuidv4())
  }
  res.send({ uuids: uuids})
})

app.listen(port, () => {
  console.log(`Example app listening on port ${port}`)
})