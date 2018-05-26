import * as http from "http";
import * as debug from "debug";
import app from "./app";

const port = process.env.PORT || '3000';

app.listen(port, (err: any) => {
  if (err) {
    return console.log(err);
  }

  return console.log(`server is listening on ${port}`);
})