import { useState, useEffect } from 'react';
import axios from 'axios';
import { useParams } from 'react-router-dom';

function VideogameDetail() {
    const { id } = useParams();
    const [videogame, setVideogame] = useState(null);
    const [error, setError] = useState(null);

    useEffect(() => {
        axios
            .get(`http://localhost:8000/api/videogames/${id}`)
            .then((response) => {
                if (response.data.success) {
                    setVideogame(response.data.data);
                } else {
                    setError('Failed to load videogame');
                }
            })
            .catch((error) => {
                setError('Error fetching videogame: ' + error.message);
            });
    }, [id]);

    if (error) return <div className="alert alert-danger">{error}</div>;
    if (!videogame) return <div>Loading...</div>;

    return (
        <div>
            <h1>{videogame.titolo}</h1>
            <div className="card bg-dark text-white">
                {videogame.copertina ? (
                    <img
                        src={`http://localhost:8000/storage/${videogame.copertina}`}
                        className="card-img-top"
                        alt={videogame.titolo}
                        style={{ maxWidth: '450px', alignSelf: 'center' }}
                    />
                ) : (
                    <div
                        className="card-img-top bg-secondary text-center"
                        style={{ height: '150px', lineHeight: '150px' }}
                    >
                        No Cover
                    </div>
                )}
                <div className="card-body">
                    <p>
                        <strong>Year:</strong> {videogame.anno}
                    </p>
                    <p>
                        <strong>Producer:</strong> {videogame.producer?.name || 'N/A'}
                    </p>
                    <p>
                        <strong>Genres:</strong>{' '}
                        {videogame.genres && videogame.genres.map((genre) => (
                            <span
                                key={genre.id}
                                className="badge"
                                style={{ backgroundColor: genre.color }}
                            >
                                {genre.name}
                            </span>
                        ))}
                    </p>
                    <p>
                        <strong>Description:</strong> {videogame.description || 'No description'}
                    </p>
                </div>
            </div>
        </div>
    );
}

export default VideogameDetail;