import { useState, useEffect } from "react";
import axios from 'axios';
import { Link } from "react-router-dom";

import { useState, useEffect } from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';

function VideogameList() {
    const [videogames, setVideogames] = useState([]);

    useEffect(() => {
        axios
            .get('http://localhost:8000/api/videogames')
            .then((response) => {
                if (response.data.success) {
                    setVideogames(response.data.data);
                }
            })
            .catch((error) => {
                console.error('Error fetching videogames:', error);
            });
    }, []);

}
