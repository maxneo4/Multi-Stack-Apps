package main

import (
	"encoding/json"
	"fmt"
	"github.com/google/uuid"
	"log"
	"net/http"
	"os"
	"strconv"
)

func main() {

	http.HandleFunc("/api/generate/uuid", func(w http.ResponseWriter, r *http.Request) {
		ManageUuidGenerator(w, r)
	})

	port := os.Getenv("HTTP_PLATFORM_PORT")
	if port == "" {
		port = "8040"
	}
	log.Fatal(http.ListenAndServe(fmt.Sprintf(":%s", port), nil))
}

func ManageUuidGenerator(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")

	countParam := r.URL.Query().Get("count")
	count, err := strconv.ParseInt(countParam, 0, 32)

	if err != nil || count < 1 {
		w.WriteHeader(http.StatusBadRequest)
	} else {
		w.WriteHeader(http.StatusOK)
		slice := make([]uuid.UUID, count)
		for i, _ := range slice {
			slice[i] = uuid.New()
		}
		data, _ := json.Marshal(generated{Uuids: slice})
		w.Write(data)
	}
}

type generated struct {
	Uuids []uuid.UUID `json:"uuids"`
}