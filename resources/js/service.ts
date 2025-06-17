export function getImageSrc(path: string) {
  // Normalize the path
  if(!path) {
    path = '';
  }
  return '/' + path.replace(/^\/+|\/+$/g, '').replace(/\/{2,}/g, '/')
}

export function formatDate(dateString: string) {
    const date = new Date(dateString);
    const year = date.getFullYear();
    const month = date.toLocaleString('default', { month: 'long' });
    const day = String(date.getDate()).padStart(2, '0');

    return `${day} ${month} ${year}`;
}