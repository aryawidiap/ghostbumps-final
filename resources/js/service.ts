export function getImageSrc(path: string) {
  // Normalize the path
  return '/' + path.replace(/^\/+|\/+$/g, '').replace(/\/{2,}/g, '/')
}