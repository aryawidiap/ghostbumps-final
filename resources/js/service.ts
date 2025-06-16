export function getImageSrc(path: string) {
  // Normalize the path
  if(!path) {
    path = '';
  }
  return '/' + path.replace(/^\/+|\/+$/g, '').replace(/\/{2,}/g, '/')
}